<div class="container">
    <div class="row">
        <div class="section-title">
            <H2>Best Employee</H2>
        </div>
        <!-- Team item --><div class="row text-center">
        @foreach ($karyawan as $row) 
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow p-3 mb-5 py-5 px-4"><img src="{{ $row->image }}" alt="" width="120" height="120" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">{{ $row->nama }}</h5>
                <span class="small text-uppercase text-muted">{{ $row->description }}</span>
            </div>
        </div><!-- End -->
        @endforeach
            </div>
    </div>
        </div>
    </div>
</div>
