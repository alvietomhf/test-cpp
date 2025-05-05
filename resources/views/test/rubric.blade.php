<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title text-white" id="myModalLabel1">Detail Rubrik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th>Aspek Penilaian</th>
                        <th>Deskripsi Kriteria</th>
                        <th style="width: 10%;">Skor Maksimal</th>
                        <th style="width: 10%;">Skor yang Diperoleh</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $grouped = [];
                    @endphp

                    @foreach ($data->resultDetails as $detail)
                        @foreach ($detail->resultDescriptions as $desc)
                            @foreach ($desc->rdFirstAnswers as $first)
                                @php
                                    $aspect = $first->firstAnswer->assessmentSubaspect->aspect;
                                    $subaspect = $first->firstAnswer->assessmentSubaspect;

                                    $grouped[$aspect->id]['aspect_name'] = $aspect->name;
                                    $grouped[$aspect->id]['subaspects'][$subaspect->id]['subaspect_name'] =
                                        $subaspect->name;

                                    $grouped[$aspect->id]['subaspects'][$subaspect->id]['descriptions'][] = [
                                        'level' => 'first',
                                        'desc' => $first->firstAnswer->detail,
                                        'score_max' => $first->firstAnswer->score,
                                        'score_obtained' => $first->correct ? $first->firstAnswer->score : 0,
                                    ];
                                @endphp

                                @foreach ($first->rdSecondAnswers as $second)
                                    @php
                                        $grouped[$aspect->id]['subaspects'][$subaspect->id]['descriptions'][] = [
                                            'level' => 'second',
                                            'desc' => $second->secondAnswer->detail,
                                            'score_max' => $second->secondAnswer->score,
                                            'score_obtained' => $second->correct ? $second->secondAnswer->score : 0,
                                        ];
                                    @endphp

                                    @foreach ($second->rdThirdAnswers as $third)
                                        @php
                                            $grouped[$aspect->id]['subaspects'][$subaspect->id]['descriptions'][] = [
                                                'level' => 'third',
                                                'desc' => $third->thirdAnswer->detail,
                                                'score_max' => $third->thirdAnswer->score,
                                                'score_obtained' => $third->correct ? $third->thirdAnswer->score : 0,
                                            ];
                                        @endphp
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach

                    @foreach (collect($grouped)->sortKeys() as $aspectIndex => $aspect)
                        @php
                            $allDescriptions = collect($aspect['subaspects'])->pluck('descriptions')->flatten(1);
                            $totalMax = $allDescriptions->sum('score_max');
                            $totalObtained = $allDescriptions->sum('score_obtained');
                        @endphp

                        <tr>
                            <td colspan="2"><strong>{{ $loop->index + 1 }}. {{ $aspect['aspect_name'] }}</strong>
                            </td>
                            <td class="text-center"><strong>{{ $totalMax }}</strong></td>
                            <td class="text-center"><strong>{{ $totalObtained }}</strong></td>
                        </tr>

                        @foreach (collect($aspect['subaspects'])->sortKeys() as $subaspect)
                            @php
                                $descCount = count($subaspect['descriptions']);
                            @endphp

                            @foreach ($subaspect['descriptions'] as $descIndex => $item)
                                <tr>
                                    @if ($descIndex === 0)
                                        <td class="text-center align-middle" rowspan="{{ $descCount }}">
                                            {{ $subaspect['subaspect_name'] }}</td>
                                    @endif

                                    <td>
                                        @if ($item['level'] === 'second')
                                            &nbsp;&nbsp;- {{ $item['desc'] }}
                                        @elseif ($item['level'] === 'third')
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- {{ $item['desc'] }}
                                        @else
                                            - {{ $item['desc'] }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item['score_max'] }}</td>
                                    <td class="text-center">{{ $item['score_obtained'] }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach

                </tbody>
            </table>

            <div class="mt-2 text-center">
                <h5><strong>Nilai Akhir:</strong> {{ $finalScore }}</h5>
                <h5><strong>Kriteria:</strong> {{ $criteria }}</h5>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-info" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
