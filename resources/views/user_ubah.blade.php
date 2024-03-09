<body>
    <h1>Form Ubah Data User</h1>
    <a href={{route('/user')}}>Kembali</a>
    <form method="POST" action={{route('/user/ubah_simpan', $data->user_id)}}>
        {{csrf_field()}}
        {{method_field('PUT')}}
        <label for="username">Username</label>
        <input type="text" name="username" value="{{$data->username}}">
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{$data->nama}}">
        <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id" value="{{$data->level_id}}">
        <br>
        <input type="submit" name="btn btn-success" value="Ubah">
    </form>
</body>
