@php
    $user = Auth::user();
    $name = $user && !empty($user->name) ? $user->name : 'User';
    $initial = strtoupper(substr(trim($name), 0, 1));
    $colors = ['#2563eb','#7c3aed','#ec4899','#f59e0b','#10b981','#06b6d4','#8b5cf6'];
    $index = abs((ord($initial) - 65) % count($colors));
    $bg = $colors[$index];
@endphp

<div class="profile">
    <div class="profile-avatar" style="background: linear-gradient(135deg, var(--blue), var(--teal))">{{ $initial }}</div>
    <div class="profile-info">
        <h4>{{ $name }}</h4>
        <p>Administrator</p>
    </div>
</div>
