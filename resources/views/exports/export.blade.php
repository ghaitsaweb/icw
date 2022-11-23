<table>
    <thead>
        <tr>
            <th>NO Request</th>
            <th>Pelapor</th>
            <th>Tgl Lapor</th>
            <th>Cabang</th>
            <th>Spk</th>
            <th>Penyebab</th>
            <th>Permintaan</th>
            <th>Akibat</th>
            <th>Status</th>
            <th>Approved</th>
            <th>Tgl Approved</th>
            <th>solved</th>
            <th>Tgl Solved</th>
        </tr>
    </thead>
    <tbody>
        @foreach($export as $ex)
        <tr>
            <td>{{$ex->no_req}}</td>
            <td>{{$ex->pelapor}}</td>
            <td>{{$ex->tgl_create}}</td>
            <td>{{$ex->cabang->nama_cabang}}</td>
            <td>{{$ex->spk}}</td>
            <td>{{$ex->penyebab == null ? $ex->dll_penyebab : $ex->rel_penyebab->penyebab}}</td>
            <td>{{$ex->permintaan}}</td>
            <td>{{$ex->akibat == null ? $ex->dll_akibat : $ex->rel_akibat->akibat}}</td>
            <td>{{$ex->status}}</td>
            <td>{{$ex->chiefstore}}</td>
            <td>{{$ex->tgl_approved}}</td>
            <td>{{$ex->aktor}}</td>
            <td>{{$ex->tgl_solved}}</td>

        </tr>
        @endforeach
    </tbody>

</table>
