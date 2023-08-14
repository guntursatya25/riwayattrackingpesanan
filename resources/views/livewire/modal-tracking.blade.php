<div>
    <div wire:ignore.self class="modal fade" id="viewModal" tabindex="-2" data-keyboard="false" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-loader"></div>

        <div class="modal-dialog modal-lg modal-dialog-centered  modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-2 p-2">
                            <div class="col-12">
                                <span>No Pesanan : {{ $no_pesanan }}</span>
                            </div>
                            {{-- <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" wire:model="nama" id="nama"
                                        placeholder="Nama">
                                    <label for="nama">Nama</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" wire:model="email" id="emailnya"
                                        placeholder="Email">
                                    <label for="emailnya">Email</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" wire:model="noWa" id="noWa"
                                        placeholder="No Wa">
                                    <label for="noWa">No Wa</label>
                                </div>
                            </div> --}}
                            @php
                                $pesananku = explode(',', $pesanan);
                                $jumlahku = explode(',', $jumlah);
                            @endphp

                            <div class="col-12">
                                <div wire:ignore.self class="row">
                                    <div id="kolompesanan" class="col-6">
                                        <label for="pesanan">Pesanan</label>
                                        @foreach ($pesananku as $item)
                                            <div class="row mb-2 ulangin">
                                                <div class="col">
                                                    <input type="text" name="pesananku[]" id="pesanan"
                                                        class="form-control" value="{{ $item }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="kolomjumlah" class="col-6">
                                        <label for="jumlah">Jumlah</label>
                                        @foreach ($jumlahku as $item)
                                            <div class="row mb-2 ulangin">
                                                <div class="col">
                                                    <input type="text" name="jumlahku[]" id="pesanan"
                                                        class="form-control" value="{{ $item }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>


                            <div class="col d-flex justify-content-center">
                                <button type="button" onclick="addItems()" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-plus"></i>
                                </button>
                                <button class="btn btn-danger ms-2" type="button" onclick="removeItem()">
                                    <i class="bi bi-dash"></i>
                                </button>
                            </div>

                            <input type="hidden" class="form-control" wire:model="hiddenInputPesanan"
                                id="hiddenInputPesanan" name="hiddenPesanan">
                            <input type="hidden" id="hiddenInputJumlah" class="form-control"
                                wire:model="hiddenInputJumlah" name="hiddenJumlah">

                            {{-- <input type="text" class="form-control" wire:model="hiddenInputPesanan"
                                id="hiddenInputPesanan" name="hiddenPesanan">
                            <input id="hiddenInputJumlah" class="form-control" type="text"
                                wire:model="hiddenInputJumlah" name="hiddenJumlah"> --}}

                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                            <button class="btn btn-primary btn-sm"" onclick="combineValues()" type="submit"
                                wire:click.prevent="update" wire:loading.attr="disabled">Simpan</button>

                        </div>
                    </form>
                    {{-- <button type="button" onclick="combineValues()">Gabungkan Nilai</button> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-2" data-keyboard="false" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-loader"></div>

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-2 p-2">
                            <div class="col-12">
                                <h5>Are you sure? You want to delete this data "{{ $no_pesanan }}" ?</h5>
                            </div>
                        </div>
                        <button wire:click.prevent="actionDelete" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Status Modal --}}
    <div wire:ignore.self class="modal fade" id="statusModal" tabindex="-2" data-keyboard="false" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-loader"></div>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Status</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-2 p-2">
                            <div class="col-12">
                                <span>Status</span>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
