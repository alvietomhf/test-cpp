<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
    style="box-shadow: none; border-right: 1px #e6e6e6 solid;" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->is('dashboard') ? ' active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            @role('teacher')
                <li class=" nav-item {{ request()->is('kelas*') ? ' active' : '' }}">
                    <a href="{{ route('teacher.kelas.index') }}">
                        <i class="la la-television"></i>
                        <span class="menu-title">Kelas</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('siswa*') ? ' active' : '' }}">
                    <a href="{{ route('teacher.student.index') }}">
                        <i class="la la-users"></i>
                        <span class="menu-title">Siswa</span>
                    </a>
                </li>
                <li class=" nav-item {{ request()->is('hasil-tes*') ? ' active' : '' }}">
                    <a href="{{ route('teacher.result') }}">
                        <i class="la la-bookmark"></i>
                        <span class="menu-title">Hasil Tes</span>
                    </a>
                </li>
                @php
                    $competency = \App\Models\Competency::all();
                @endphp
                <li class=" nav-item {{ request()->is('*/pertanyaan') ? 'menu-collapsed-open open' : '' }}">
                    <a href="#">
                        <i class="la la-file"></i>
                        <span class="menu-title">Soal</span>
                    </a>
                    <ul class="menu-content">
                        @foreach ($competency as $key => $value)
                            <li
                                style="background-color: {{ request()->is($value->slug . '/pertanyaan*') ? '#512da8' : '' }}; font-weight: {{ request()->is($value->slug . '/pertanyaan*') ? 'bold' : 'normal' }};">
                                <a class="menu-item" href="{{ route('teacher.pertanyaan.index', [$value->slug]) }}"
                                    style=" color: {{ request()->is($value->slug . '/pertanyaan*') ? '#ffffff' : '#6b6f82' }} !important;">
                                    <i class="la la-circle-o"></i>
                                    <span> {{ $value->title ?? '' }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endrole

            @role('student')
                @php
                    $progress = \App\Models\Progress::where('user_id', auth()->user()->id)
                        ->whereHas('competency', function ($query) {
                            $query->where('id', '!=', 6);
                        })
                        ->with('competency')
                        ->get();

                    $project = \App\Models\Progress::where('user_id', auth()->user()->id)
                        ->whereHas('competency', function ($query) {
                            $query->where('id', 6);
                        })
                        ->with('competency')
                        ->get();
                @endphp

                <li class=" nav-item {{ request()->is('hasil-tes-siswa') ? ' active' : '' }}">
                    <a href="{{ route('student.result') }}">
                        <i class="la la-bookmark"></i>
                        <span class="menu-title" data-i18n="Hasil">Hasil</span>
                    </a>
                </li>

                <li class=" nav-item">
                    <a href="{{ asset('assets/Contoh Penulisan Program.pdf') }}" target="_blank">
                        <i class="la la-pencil"></i>
                        <span class="menu-title" data-i18n=">Crypto">Penulisan Kode</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="{{ asset('assets/cpp_tutorial.pdf') }}" target="_blank">
                        <i class="la la-book"></i>
                        <span class="menu-title" data-i18n=">Sales">Referensi</span>
                    </a>
                </li>


                <li
                    class=" nav-item {{ request()->is('tes/*') && !request()->is('tes/proyek-akhir*') ? 'menu-collapsed-open open' : '' }}">
                    <a href="#">
                        <i class="la la-clipboard"></i>
                        <span class="menu-title" data-i18n="Soal">Soal Tes</span>
                    </a>
                    <ul class="menu-content">
                        @foreach ($progress as $key => $value)
                            <li
                                style="background-color: {{ request()->is('tes/' . $value->competency->slug . '*') ? '#512da8' : '' }}; font-weight: {{ request()->is('tes/' . $value->competency->slug . '*') ? 'bold' : 'normal' }};">
                                <a href="{{ route('student.test.show', [$value->competency->slug]) }}" class="menu-item"
                                    style=" color: {{ request()->is('tes/' . $value->competency->slug . '*') ? '#ffffff' : '#6b6f82' }} !important;">
                                    <i
                                        class="mr-1 @if ($value->status !== 'lock') {{ 'ft-unlock' }}@else{{ 'ft-lock' }} @endif"></i>
                                    <span
                                        data-i18n="{{ $value->competency->title }}">{{ $value->competency->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @foreach ($project as $key => $value)
                    <li class=" nav-item {{ request()->is('tes/proyek-akhir*') ? 'active' : '' }}">
                        <a href="{{ route('student.test.show', [$value->competency->slug]) }}">
                            <i class="la la-file-code-o"></i>
                            <span class="menu-title"
                                data-i18n="{{ $value->competency->title }}">{{ $value->competency->title }}</span>
                        </a>
                    </li>
                @endforeach
            @endrole
        </ul>
    </div>
</div>
