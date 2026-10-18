<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $fillable = [
        'nama_perusahaan','alamat','jurusan_dibutuhkan','bidang','kuota','deskripsi','gambar'
    ];

    protected $casts = [
        'jurusan_dibutuhkan' => 'array',
    ];

    public function getJurusanDibutuhkanAttribute($value)
    {
        // Jika sudah array, langsung return
        if (is_array($value)) {
            return $value;
        }
        
        // Jika JSON string, decode dulu
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                return $decoded;
            }
        }
        
        return $value;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    
    protected $table = 'perusahaans';

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

    /**
     * Generate placeholder logo SVG if no image exists
     */
    public function getLogoUrl()
    {
        if ($this->gambar) {
            return asset('image/perusahaan/' . $this->gambar);
        }

        // Generate initials from company name
        $initials = $this->getInitials();
        
        // Generate consistent color based on company name
        $color = $this->getColorFromName();
        
        // Create SVG placeholder
        $svg = $this->generatePlaceholderSvg($initials, $color);
        
        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }

    /**
     * Get initials from company name
     */
    private function getInitials()
    {
        $words = explode(' ', trim($this->nama_perusahaan));
        $initials = '';
        
        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper($word[0]);
                if (strlen($initials) >= 2) {
                    break;
                }
            }
        }
        
        return $initials ?: 'P'; // Default to 'P' for Perusahaan
    }

    /**
     * Generate consistent color based on company name
     */
    private function getColorFromName()
    {
        $colors = [
            '#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8',
            '#F7DC6F', '#BB8FCE', '#85C1E2', '#F8B739', '#52C0A1',
            '#FF8A5B', '#6C63FF', '#00D4FF', '#FF006E', '#FB5607',
            '#FFBE0B', '#8338EC', '#3A86FF', '#06FFA5', '#FB1D1D'
        ];
        
        // Create deterministic hash from company name
        $hash = abs(crc32($this->nama_perusahaan));
        $index = $hash % count($colors);
        
        return $colors[$index];
    }

    /**
     * Generate SVG placeholder
     */
    private function generatePlaceholderSvg($initials, $color)
    {
        return sprintf(
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="200" height="200">
                <rect width="200" height="200" fill="%s" rx="12"/>
                <text x="100" y="115" font-family="Arial, sans-serif" font-size="72" font-weight="bold" 
                      text-anchor="middle" fill="white" dominant-baseline="middle">%s</text>
            </svg>',
            $color,
            htmlspecialchars($initials)
        );
    }
}
