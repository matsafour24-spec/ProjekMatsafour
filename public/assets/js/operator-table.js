// FINAL: AJAX search + select + copy TAB multi-row

let selectedRows = [];

function updateSelectedCount() {
    const el = document.getElementById('selectedCount');
    if (el) el.innerText = selectedRows.length;
}

function resetSelection() {
    selectedRows = [];
    updateSelectedCount();
}

function toggleSelectRow(checkbox, row) {
    if (checkbox.checked) {
        if (!selectedRows.find(r => r.id_guru === row.id_guru)) {
            selectedRows.push(row);
        }
    } else {
        selectedRows = selectedRows.filter(r => r.id_guru !== row.id_guru);
    }
    updateSelectedCount();
}

function copySelectedRows() {
    if (selectedRows.length === 0) {
        alert('Tidak ada data terpilih');
        return;
    }
    const text = selectedRows.map(r =>
        [r.nama_lengkap || '', r.nip || '', r.golongan || '', r.jabatan || ''].join('\t')
    ).join('\n');
    copyToClipboard(text);
}

document.addEventListener('DOMContentLoaded', () => {
    const btnSearch = document.getElementById('btnSearch');
    const btnCopy = document.getElementById('btnTampilkanTerpilih');
    const input = document.getElementById('keyword');
    const tbody = document.getElementById('guruTableBody');

    btnSearch.addEventListener('click', searchGuru);
    input.addEventListener('keyup', e => { if (e.key === 'Enter') searchGuru(); });
    btnCopy.addEventListener('click', copySelectedRows);

    function searchGuru() {
        resetSelection();
        const keyword = input.value.trim();
        tbody.innerHTML = '<tr><td colspan="5" class="text-center">Memuat...</td></tr>';

        fetch(`${BASE_URL}operator/guru/search?keyword=${encodeURIComponent(keyword)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(r => r.json())
            .then(res => {
                if (!res || !res.data || res.data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>';
                    return;
                }
                tbody.innerHTML = '';
                res.data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
          <td class="text-center">
            <input type="checkbox" onchange='toggleSelectRow(this, ${JSON.stringify({
                        id_guru: row.id_guru,
                        nama_lengkap: row.nama_lengkap,
                        nip: row.nip || '',
                        golongan: row.golongan || '',
                        jabatan: row.jabatan || ''
                    })})'>
          </td>
          <td>${row.nama_lengkap ?? '-'}</td>
          <td>${row.nip ?? '-'}</td>
          <td>${row.golongan ?? '-'}</td>
          <td>${row.jabatan ?? '-'}</td>
        `;
                    tbody.appendChild(tr);
                });
            })
            .catch(() => {
                tbody.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Gagal memuat</td></tr>';
            });
    }
});
