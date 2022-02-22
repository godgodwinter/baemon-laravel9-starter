<form action="{{ $link }}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-icon btn-danger btn-sm"
        onclick="return  confirm('Anda yakin menghapus data ini? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus data!"><span
            class="pcoded-micon"> <i class="fa-solid fa-trash-can"></i></span></button>
</form>
