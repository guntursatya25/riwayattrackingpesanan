<div>
    <div class="card-body">
        <div class="divider">
            <div class="divider-text">
                <h3>Ulasan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <div class="rating">
                    <input type="radio" wire:model="rating" value="5" id="5"
                        {{ $datarating ? 'disabled' : '' }}><label for="5" title="5 Star">☆</label></input>
                    <input type="radio" wire:model="rating" value="4" id="4"
                        {{ $datarating ? 'disabled' : '' }}><label for="4" title="4 Star">☆</label></input>
                    <input type="radio" wire:model="rating" value="3" id="3"
                        {{ $datarating ? 'disabled' : '' }}><label for="3" title="3 Star">☆</label></input>
                    <input type="radio" wire:model="rating" value="2" id="2"
                        {{ $datarating ? 'disabled' : '' }}><label for="2" title="2 Star">☆</label></input>
                    <input type="radio" wire:model="rating" value="1" id="1"
                        {{ $datarating ? 'disabled' : '' }}><label for="1" title="1 Star">☆</label></input>
                    @error('rating')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p>Anda memberikan rating: {{ $rating }} bintang</p>
                    {{-- <p>hasil {{ $datarating }}</p> --}}
                </div>

                <div class="form-floating">
                    <textarea class="form-control" wire:model="komentar" placeholder="Leave a comment here" id="ulasansec"
                        {{ $datarating ? 'disabled' : '' }}></textarea>
                    <label for="ulasansec">Comments</label>
                </div>
                <div class="mt-2">

                    <button wire:click="datadisimpan"
                        class="btn btn-primary p-3 {{ $datarating ? 'd-none' : '' }}">Kirim</button>
                </div>
            </div>
            {{-- <div class="col-3">
                <button wire:click="simpanUlasan" class="btn btn-primary p-3">Kirim</button>
            </div> --}}
            <div class="mt-2">
                @if ($message = Session::get('sukses'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ $message }}</strong>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('error') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
