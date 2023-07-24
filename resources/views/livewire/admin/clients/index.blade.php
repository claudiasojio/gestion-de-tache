<div>

    @include('livewire.admin.clients.delete')

    @if (session('message'))
        <h1 class="alert alert-success">{{ session('message') }},</h1>
    @endif
    <div class="card-header">
        <h3>Tasks Save: {{ $clientss->count() }}
            <a href="{{ url('admin/clients/create') }}" class="btn btn-primary btn-sm float-right">Add Tasks</a>
        </h3>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="table-responsive">
                    @php
                        $stand = 0;
                        
                        $encours = 0;
                        
                        $terminer = 0;
                        
                        $ide = 0;
                        
                    @endphp
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Statut</th>
                                    <th>Date_debut</th>
                                    <th>Date_fin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientss as $clients)
                                    <tr>
                                        <td>{{ $ide }}</td>
                                        <td>{{ $clients->nom }}</td>
                                        <td>{{ $clients->description }}</td>
                                        <td>{{ $clients->statut }}</td>
                                        
                                        <td>{{ $clients->date_debut }}</td>
                                        <td>{{ $clients->date_fin }}</td>
                                        <td class="col-md-3">
                                            <a href="{{ url('admin/clients/' . $clients->id . '/view') }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <a href="{{ url('admin/clients/' . $clients->id . '/edit') }}"
                                                class="btn  btn-sm btn-success">Edit</a>
                                            <a href="#"
                                                wire:click="deleteClients( {{ $clients->id }} ) "data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" class="btn  btn-sm btn-danger">Delete</a>
                                            {{-- <a href="{{ terminer('admin/clients/terminer' . $clients->id ) }}"
                                                    class="btn  btn-sm btn-primary">Terminer</a> --}}
                                            <br>
                                            @if ($clients->statut == 'Stand-by')
                                                <a href="{{ route('terminer', $clients->id) }}" class="btn  my-2  btn-sm btn-primary">Finish</a>
                                            @elseif ($clients->statut == 'Pending...')
                                            <a href="{{ route ('terminer', $clients->id) }}" class=" my-2 btn  btn-sm btn-primary">Finish</a>
                                            @endif
                                            
                                            
                                            <a href="/En_cours/{{ $clients->id }}"
                                                class=" my-2 btn  btn-sm btn-secondary">Pending</a>
                                        </td>
                                    </tr>

                                    @if ($clients->statut == 'Stand-by')
                                        @php
                                            $stand += 1;
                                        @endphp
                                    @elseif ($clients->statut == 'Pending...')
                                        @php
                                            
                                            $encours += 1;
                                        @endphp
                                    @else
                                        @php
                                            $terminer += 1;
                                        @endphp
                                    @endif
                                    @php
                                        $ide + 1;
                                    @endphp
                                    @php
                                        
                                        $ide = $stand + $encours + $terminer;
                                        
                                        $pourcentageStand = $ide !== 0 ? ($stand / $ide) * 100 : 0;
                                        
                                        $pourcentagePending = $ide !== 0 ? ($encours / $ide) * 100 : 0;
                                        
                                        $pourcentageTerminer = $ide !== 0 ? ($terminer / $ide) * 100 : 0;
                                    @endphp
                                @endforeach

                                <div class="float-end">
                                    <p> Number of tasks satnd-by:  {{ $stand }}</p>

                                    <p> Number of tasks pending :  {{ $encours }}</p>

                                    <p> Number of task terminated:  {{ $terminer }}</p>

                                    <p>Total number: {{ $ide }}</p>

                                </div>
                                <div>


                                    <p>Tasks percents Stand-by: {{ $pourcentageStand }}%</p>

                                    <p>Tasks percents Pending: {{ $pourcentagePending }}%</p>

                                    <p>Tasks percents Finish: {{ $pourcentageTerminer }}%</p>

                                </div>


                            </tbody>
                        </table>

                        <div>
                            {{ $clientss->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        })
    </script>
@endpush
