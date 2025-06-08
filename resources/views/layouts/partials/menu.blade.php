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
                <li class=" nav-item {{ request()->is('hasil-*') ? 'menu-collapsed-open open' : '' }}">
                    <a href="#">
                        <i class="la la-bookmark"></i>
                        <span class="menu-title">Hasil Tes</span>
                    </a>
                    <ul class="menu-content">
                        <li
                            style="background-color: {{ request()->is('hasil-kognitif*') ? '#512da8' : '' }}; font-weight: {{ request()->is('hasil-kognitif*') ? 'bold' : 'normal' }};">
                            <a class="menu-item" href="{{ route('teacher.result.kognitif') }}"
                                style=" color: {{ request()->is('hasil-kognitif*') ? '#ffffff' : '#6b6f82' }} !important;">
                                <i class="la la-circle-o"></i>
                                <span> Kognitif</span>
                            </a>
                        </li>
                        <li
                            style="background-color: {{ request()->is('hasil-psikomotorik*') ? '#512da8' : '' }}; font-weight: {{ request()->is('hasil-psikomotorik*') ? 'bold' : 'normal' }};">
                            <a class="menu-item" href="{{ route('teacher.result') }}"
                                style=" color: {{ request()->is('hasil-psikomotorik*') ? '#ffffff' : '#6b6f82' }} !important;">
                                <i class="la la-circle-o"></i>
                                <span> Psikomotorik</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item {{ request()->is('kognitif*') ? ' active' : '' }}">
                    <a href="{{ route('teacher.kognitif.index') }}">
                        <i class="la la-question"></i>
                        <span class="menu-title">Soal Kognitif</span>
                    </a>
                </li>
                @php
                    $competency = \App\Models\Competency::all();
                @endphp
                <li
                    class=" nav-item {{ request()->is('*/pertanyaan*') || request()->is('*/keterangan*') ? 'menu-collapsed-open open' : '' }}">
                    <a href="#">
                        <i class="la la-code-fork"></i>
                        <span class="menu-title">Soal Psikomotorik</span>
                    </a>
                    <ul class="menu-content">
                        @foreach ($competency as $key => $value)
                            <li
                                style="background-color: {{ request()->is($value->slug . '/pertanyaan*') || request()->is($value->slug . '/keterangan*') ? '#512da8' : '' }}; font-weight: {{ request()->is($value->slug . '/pertanyaan*') || request()->is($value->slug . '/keterangan*') ? 'bold' : 'normal' }};">
                                <a class="menu-item" href="{{ route('teacher.pertanyaan.index', [$value->slug]) }}"
                                    style=" color: {{ request()->is($value->slug . '/pertanyaan*') || request()->is($value->slug . '/keterangan*') ? '#ffffff' : '#6b6f82' }} !important;">
                                    <i class="la la-circle-o"></i>
                                    <span> {{ $value->id === 4 ? 'Post Tes Psikomotorik' : $value->title ?? '' }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class=" nav-item {{ request()->is('pjbl*') ? 'menu-collapsed-open open' : '' }}">
                    <a href="#">
                        <i class="la la-share-alt"></i>
                        <span class="menu-title">Pjbl</span>
                    </a>
                    <ul class="menu-content">
                        <li
                            style="background-color: {{ request()->is('pjbl/soal*') ? '#512da8' : '' }}; font-weight: {{ request()->is('pjbl/soal*') ? 'bold' : 'normal' }};">
                            <a class="menu-item" href="{{ route('teacher.pjbl.question.index') }}"
                                style=" color: {{ request()->is('pjbl/soal*') ? '#ffffff' : '#6b6f82' }} !important;">
                                <i class="la la-circle-o"></i>
                                <span> Soal</span>
                            </a>
                        </li>
                        <li
                            style="background-color: {{ request()->is('pjbl/kelompok*') ? '#512da8' : '' }}; font-weight: {{ request()->is('pjblpsikomotorik*') ? 'bold' : 'normal' }};">
                            <a class="menu-item" href="{{ route('teacher.pjbl.group.index') }}"
                                style=" color: {{ request()->is('pjbl/kelompok*') ? '#ffffff' : '#6b6f82' }} !important;">
                                <i class="la la-circle-o"></i>
                                <span> Kelompok</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endrole

            @role('student')
                @php
                    $progress = \App\Models\Progress::where('user_id', auth()->user()->id)
                        ->whereHas('competency', function ($query) {
                            $query->where('id', '!=', 4);
                        })
                        ->with('competency')
                        ->get();

                    $project = \App\Models\Progress::where('user_id', auth()->user()->id)
                        ->whereHas('competency', function ($query) {
                            $query->where('id', 4);
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
                    class=" nav-item {{ request()->is('tes/*') && !request()->is('tes/psikomotorik*') ? 'menu-collapsed-open open' : '' }}">
                    <a href="#">
                        <i class="la la-play"></i>
                        <span class="menu-title" data-i18n="Soal">Play Ground</span>
                    </a>
                    <ul class="menu-content">
                        @foreach ($progress as $key => $value)
                            <li
                                style="background-color: {{ request()->is('tes/' . $value->competency->slug . '*') ? '#512da8' : '' }}; font-weight: {{ request()->is('tes/' . $value->competency->slug . '*') ? 'bold' : 'normal' }};">
                                <a href="{{ route('student.test.show', [$value->competency->slug]) }}" class="menu-item"
                                    style=" color: {{ request()->is('tes/' . $value->competency->slug . '*') ? '#ffffff' : '#6b6f82' }} !important;">
                                    <i class="mr-1 la la-code"></i>
                                    <span
                                        data-i18n="{{ $value->competency->title }}">{{ $value->competency->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class=" nav-item {{ request()->is('tes-kognitif*') ? 'active' : '' }}">
                    <a href="{{ route('student.pretest.show') }}">
                        <i class="la la-clipboard"></i>
                        <span class="menu-title" data-i18n="Tes Kognitif">Tes Kognitif</span>
                    </a>
                </li>

                @foreach ($project as $key => $value)
                    <li class=" nav-item {{ request()->is('tes/psikomotorik*') ? 'active' : '' }}">
                        <a href="{{ route('student.test.show', [$value->competency->slug]) }}">
                            <i class="la la-code-fork"></i>
                            <span class="menu-title" data-i18n="Tes Psikomotorik">Tes Psikomotorik</span>
                        </a>
                    </li>
                @endforeach

                <li class=" nav-item {{ request()->is('pjbl*') ? ' active' : '' }}">
                    <a href="{{ route('student.pjbl.group.index') }}">
                        <i class="la la-share-alt"></i>
                        <span class="menu-title" data-i18n="Pjbl">Pjbl</span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</div>
