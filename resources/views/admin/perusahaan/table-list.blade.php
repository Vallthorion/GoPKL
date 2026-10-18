{{-- admin/perusahaan/table-list.blade.php --}}
@forelse ($perusahaans as $p)
<div class="list-item">
  <div class="list-logo">
    <img src="{{ $p->getLogoUrl() }}" alt="{{ $p->nama_perusahaan }}" style="width:100%;height:100%;object-fit:cover;">
  </div>

  <div class="list-main">
    <div class="list-name" title="{{ $p->nama_perusahaan }}">{{ $p->nama_perusahaan }}</div>
    <div class="list-sub">{{ $p->lokasi ?? $p->alamat ?? 'Lokasi tidak tersedia' }}</div>
    <div class="list-meta">
      <div class="list-meta-item"><strong>{{ $p->bidang ?? '-' }}</strong> Bidang</div>
      <div class="list-meta-item"><strong>{{ $p->kuota ?? 0 }}</strong> Kuota</div>
      <div class="list-meta-item"><strong>{{ ucfirst($p->status ?? 'aktif') }}</strong></div>
    </div>
  </div>

  <div class="list-actions">
    <a href="{{ route('admin.perusahaan.show', $p->id) }}" class="act-btn act-view" title="Lihat Detail">
      <i class="fa-solid fa-eye"></i>
    </a>
    <a href="{{ route('admin.perusahaan.edit', $p->id) }}" class="act-btn act-edit" title="Edit">
      <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <form action="{{ route('admin.perusahaan.destroy', $p->id) }}" method="POST" style="display:inline">
      @csrf @method('DELETE')
      <button type="button" class="act-btn act-del delete-btn" title="Hapus">
        <i class="fa-solid fa-trash"></i>
      </button>
    </form>
  </div>
</div>
@empty
<div class="empty-card">
  <div class="empty-icon"><i class="fa-solid fa-building-circle-xmark"></i></div>
  <div class="empty-title">Belum ada data perusahaan</div>
  <div class="empty-sub">Tambahkan perusahaan mitra PKL untuk memulai</div>
</div>
@endforelse