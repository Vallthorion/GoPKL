<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - Export</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f5f5;
            padding: 20px;
        }

        .print-container {
            background: white;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .header p {
            color: #7f8c8d;
            font-size: 14px;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
            font-size: 13px;
            color: #7f8c8d;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-weight: 600;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 13px;
        }

        thead {
            background-color: #34495e;
            color: white;
        }

        th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            border: 1px solid #bdc3c7;
        }

        td {
            padding: 10px 12px;
            border: 1px solid #ecf0f1;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e8f4f8;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-wali {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .badge-kakomsli {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }

        .badge-kaprog {
            background-color: #e8f5e9;
            color: #388e3c;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
            font-size: 12px;
            color: #7f8c8d;
        }

        .export-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .export-button:hover {
            background-color: #2980b9;
        }

        .back-button {
            display: inline-block;
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #95a5a6;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .back-button:hover {
            background-color: #7f8c8d;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .print-container {
                box-shadow: none;
                padding: 0;
                max-width: 100%;
            }

            .export-button, .back-button, .no-print {
                display: none !important;
            }

            table {
                page-break-inside: avoid;
            }

            tbody tr {
                page-break-inside: avoid;
            }

            .header {
                page-break-after: avoid;
            }
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            font-style: italic;
        }

        .record-count {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 4px;
            color: #2c3e50;
            font-weight: 600;
        }

        .filter-info {
            background-color: #e8f4f8;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #2c3e50;
            font-size: 13px;
        }

        .filter-info span {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="print-container">
        <div class="no-print">
            <button class="export-button" onclick="window.print()">
                <i class="fa-solid fa-print"></i> Print / Simpan sebagai PDF
            </button>
            <a href="{{ route('admin.guru.index') }}" class="back-button">Kembali</a>
        </div>

        <div class="header">
            <h1>Data Guru SMKN 6 MALANG</h1>
            <p>Laporan Data Guru dan Peran - Admin</p>
        </div>

        <div class="info-section">
            <div class="info-item">
                <span class="info-label">Tanggal Export:</span>
                <span>{{ $exportDate }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Total Guru:</span>
                <span>{{ $gurus->count() }} guru</span>
            </div>
        </div>

        @if($search || $type)
            <div class="filter-info">
                <p>Filter aktif:</p>
                @if($search)
                    <span>Pencarian: {{ $search }}</span>
                @endif
                @if($type)
                    <span>Tipe: 
                        @switch($type)
                            @case('wali_kelas')
                                Wali Kelas
                                @break
                            @case('kakomsli')
                                Kakonsli
                                @break
                            @case('kaprog_pplg')
                                Kaprog PPLG
                                @break
                        @endswitch
                    </span>
                @endif
            </div>
        @endif

        @if($gurus->count() > 0)
            <div class="record-count">
                ✓ Menampilkan {{ $gurus->count() }} data guru
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 12%">NIP</th>
                        <th style="width: 20%">Nama Guru</th>
                        <th style="width: 15%">Peran/Tipe</th>
                        <th style="width: 20%">Keterangan</th>
                        <th style="width: 12%">Username</th>
                        <th style="width: 16%">Kelas (jika ada)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gurus as $index => $guru)
                        @php
                            $typeLabel = '';
                            $typeDescription = '';
                            $badgeClass = '';
                            
                            switch($guru->type) {
                                case 'wali_kelas':
                                    $typeLabel = 'Wali Kelas';
                                    $badgeClass = 'badge-wali';
                                    $typeDescription = 'Wali Kelas ' . ($guru->kelas ?? 'N/A');
                                    break;
                                case 'kakomsli':
                                    $typeLabel = 'Kakonsli SIJA';
                                    $badgeClass = 'badge-kakomsli';
                                    $typeDescription = 'Koordinator Kompetensi SIJA';
                                    break;
                                case 'kaprog_pplg':
                                    $typeLabel = 'Kaprog PPLG SIJA';
                                    $badgeClass = 'badge-kaprog';
                                    $typeDescription = 'Kepala Program Keahlian PPLG SIJA';
                                    break;
                                default:
                                    $typeLabel = $guru->type;
                                    $typeDescription = '-';
                            }
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $guru->nip }}</strong></td>
                            <td>{{ $guru->nama }}</td>
                            <td>
                                <span class="badge {{ $badgeClass }}">
                                    {{ $typeLabel }}
                                </span>
                            </td>
                            <td>{{ $typeDescription }}</td>
                            <td>{{ $guru->user->username ?? '-' }}</td>
                            <td>{{ $guru->kelas ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">
                <p><i class="fa-solid fa-inbox"></i></p>
                <p>Tidak ada data guru untuk ditampilkan</p>
            </div>
        @endif

        <div class="footer">
            <p>Document generated on {{ now()->format('d F Y H:i:s') }}</p>
            <p>© 2026 SMKN 6 MALANG - Sistem Informasi PKL</p>
        </div>
    </div>
</body>
</html>
