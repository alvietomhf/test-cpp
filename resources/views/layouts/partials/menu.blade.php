<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->is('dashboard') ? ' active' : '' }}"><a href="{{ route('dashboard') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            @role('admin')
            <li class=" navigation-header"><span>Menu Admin</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
            </li>
            <li class=" nav-item {{ request()->is('kelas*') ? ' active' : '' }}"><a href="{{ route('admin.kelas.index') }}"><i class="la la-television"></i><span class="menu-title" data-i18n="Templates">Kelas</span></a>
            </li>
            <li class=" nav-item {{ request()->is('guru') ? ' active' : '' }}"><a href="{{ route('admin.guru.index') }}"><i class="la la-users"></i><span class="menu-title" data-i18n="Contacts">Guru</span></a>
            </li>
            @endrole
            @role('teacher')
            <li class=" navigation-header"><span>Menu Guru</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Guru Panels"></i>
            <li class=" nav-item {{ request()->is('siswa*') ? ' active' : '' }}"><a href="{{ route('teacher.student.index') }}"><i class="la la-users"></i><span class="menu-title" data-i18n="Contacts">Siswa</span></a>
            </li>
            <li class=" nav-item {{ request()->is('hasil-tes') ? ' active' : '' }}"><a href="{{ route('teacher.result') }}"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Contacts">Hasil Tes</span></a>
            </li>
            @endrole
            @role('student')
            @php
            $progress = \App\Models\Progress::where('user_id', auth()->user()->id)
                            ->with('competency')
                            ->get();
            @endphp
            <li class=" navigation-header"><span>Daftar Tes</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
            @foreach ($progress as $key => $value)
            <li class=" nav-item" style="background-color: {{ request()->is('tes/' . $value->competency->slug . '*') ? '#f5f5f5' : '' }}; font-weight: {{ request()->is('tes/' . $value->competency->slug . '*') ? 'bold' : 'normal' }};"><a href="{{ route('student.test.show', [$value->competency->slug]) }}"><i class="@if($value->status !== 'lock'){{ 'ft-unlock' }}@else{{ 'ft-lock' }}@endif"></i><span class="menu-title" data-i18n="Contacts">{{ $value->competency->name }}</span>@if($value->competency_id !== 1)<span class="badge badge badge-pill badge-info float-right mr-2" style="top: -4px; right: -1px;">Soon</span>@endif</a>
            </li>
            @endforeach
            @endrole
        </ul>
    </div>
</div>