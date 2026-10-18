@if ($perusahaans->isEmpty())
    <div class="empty-card">
        <i class="fa-solid fa-building-circle-xmark"></i>
        <p>Tidak ada perusahaan ditemukan.</p>
    </div>
@else
    @foreach ($perusahaans as $perusahaan)
        @php
            $jurusan = $perusahaan->jurusan_dibutuhkan;
            if (is_string($jurusan)) {
                $decoded = json_decode($jurusan, true);
                $jurusan = is_array($decoded) ? implode(', ', $decoded) : $jurusan;
            } elseif (is_array($jurusan)) {
                $jurusan = implode(', ', $jurusan);
            }
        @endphp
        <div class="company-card">
            <div class="company-card-top">
                <div class="company-thumb">
                    <img src="{{ $perusahaan->getLogoUrl() }}" alt="{{ $perusahaan->nama_perusahaan }}">
                </div>
                <div class="company-info">
                    <h3>{{ $perusahaan->nama_perusahaan }}</h3>
                    <p>{{ $perusahaan->bidang }}</p>
                </div>
            </div>
            <div class="company-body">
                <div class="company-label">
                    <span>Jurusan</span>
                    <span>{{ $jurusan }}</span>
                </div>
                <div class="company-label">
                    <span>Kuota</span>
                    <span>{{ $perusahaan->kuota }}</span>
                </div>
            </div>
            <div class="company-footer">
                <a href="{{ route('admin.perusahaan.edit', $perusahaan->id) }}" class="act-btn act-edit" title="Edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form action="{{ route('admin.perusahaan.destroy', $perusahaan->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="act-btn act-del delete-btn" title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endif
