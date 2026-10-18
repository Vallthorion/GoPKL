@foreach ($siswas as $index => $siswa)
<tr>
    <td>{{ $siswa->nis }}</td>
    <td>{{ $siswa->nama }}</td>
    <td>{{ $siswa->jenis_kelamin ?? '-' }}</td>
    <td>{{ $siswa->kelas }}</td>
    <td>{{ $siswa->jurusan }}</td>
    <td>{{ $siswa->guru->nama ?? 'Belum ditentukan' }}</td>
    <td>
        @if($siswa->aktif_count > 0)
            <span class="badge b-green">Aktif</span>
        @else
            <span class="badge b-gray">Inaktif</span>
        @endif
    </td>
    <td class="actions">
        <a href="{{ route('admin.siswa.edit', $siswa->id) }}" title="Edit">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </td>
</tr>
@endforeach

<!-- Pagination Data -->
<script type="application/json" id="paginationData">
{
  "firstItem": {{ $siswas->firstItem() ?? 0 }},
  "lastItem": {{ $siswas->lastItem() ?? 0 }},
  "total": {{ $siswas->total() ?? 0 }},
  "currentPage": {{ $siswas->currentPage() ?? 1 }},
  "lastPage": {{ $siswas->lastPage() ?? 1 }},
  "hasMorePages": {{ $siswas->hasMorePages() ? 'true' : 'false' }},
  "onFirstPage": {{ $siswas->onFirstPage() ? 'true' : 'false' }},
  "previousPageUrl": "{{ $siswas->appends(request()->query())->previousPageUrl() ?? '' }}",
  "nextPageUrl": "{{ $siswas->appends(request()->query())->nextPageUrl() ?? '' }}"
}
</script>
