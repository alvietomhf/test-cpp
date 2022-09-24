<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->is('dashboard') ? ' active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            @role('admin')
            <li class=" navigation-header">
                <span>Menu Admin</span>
                <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
            </li>
            <li class=" nav-item {{ request()->is('kelas*') ? ' active' : '' }}">
                <a href="{{ route('admin.kelas.index') }}">
                    <i class="la la-television"></i>
                    <span class="menu-title">Kelas</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('guru') ? ' active' : '' }}">
                <a href="{{ route('admin.guru.index') }}">
                    <i class="la la-users"></i>
                    <span class="menu-title">Guru</span>
                </a>
            </li>
            @endrole
            @role('teacher')
            <li class=" navigation-header">
                <span>Menu Guru</span>
                <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Guru Panels"></i>
            </li>
            <li class=" nav-item {{ request()->is('siswa*') ? ' active' : '' }}">
                <a href="{{ route('teacher.student.index') }}">
                    <i class="la la-users"></i>
                    <span class="menu-title">Siswa</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('hasil-tes*') ? ' active' : '' }}">
                <a href="{{ route('teacher.result') }}">
                    <i class="la la-clipboard"></i>
                    <span class="menu-title">Hasil Tes</span>
                </a>
            </li>
            @php
            $competency = \App\Models\Competency::all();
            @endphp
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-file"></i>
                    <span class="menu-title">Pertanyaan</span>
                </a>
                <ul class="menu-content">
                    @foreach ($competency as $key => $value)
                    <li class="{{ request()->is($value->slug . '/pertanyaan*') ? ' active' : '' }}">
                        <a class="menu-item" href="{{ route('teacher.pertanyaan.index', [$value->slug]) }}">
                            <i class="la la-circle-o"></i>
                            <span> {{ $value->title ?? '' }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endrole
            @role('student')
            <li class=" navigation-header">
                <span>Menu Siswa</span>
                <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Guru Panels"></i>
            </li>
            <li class=" nav-item {{ request()->is('hasil-tes-siswa') ? ' active' : '' }}">
                <a href="{{ route('student.result') }}">
                    <i class="la la-clipboard"></i>
                    <span class="menu-title">Hasil Tes</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ asset('assets/Contoh Penulisan Program.pdf') }}" target="_blank">
                    <i class="la la-file-code-o"></i>
                    <span class="menu-title">Contoh Penulisan</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ asset('assets/cpp_tutorial.pdf') }}" target="_blank">
                    <i class="la la-book"></i>
                    <span class="menu-title">Buku Tutorial</span>
                </a>
            </li>
            @php
            $progress = \App\Models\Progress::where('user_id', auth()->user()->id)
                            ->with('competency')
                            ->get();
            @endphp
            <li class=" navigation-header">
                <span>Daftar Tes</span>
                <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
            </li>
            @foreach ($progress as $key => $value)
            <li class=" nav-item" style="background-color: {{ request()->is('tes/' . $value->competency->slug . '*') ? '#f5f5f5' : '' }}; font-weight: {{ request()->is('tes/' . $value->competency->slug . '*') ? 'bold' : 'normal' }};">
                <a href="{{ route('student.test.show', [$value->competency->slug]) }}">
                    <i class="@if($value->status !== 'lock'){{ 'ft-unlock' }}@else{{ 'ft-lock' }}@endif"></i>
                    <span class="menu-title">{{ $value->competency->name }}</span>
                </a>
            </li>
            @endforeach
            @endrole
        </ul>
    </div>
</div>