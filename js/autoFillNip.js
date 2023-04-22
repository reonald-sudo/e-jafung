function autoFillNip(){
    $(document).ready(function() {

        let nip = $('#nip');
        let nama = $('#nama');
        let golongan = $('#golongan');
    
        nip.on('keyup', function() {
            // $.get("ajax/autoFillPengangkatanKembali.php?nip=" + nip.val(), function(data) {
            //     let json = data,
            //         obj = JSON.parse(json);
    
            //     nama.val(obj.nama);
            //     golongan.val(obj.golongan);
            // })
    
            alert('woy');
        })
    
    });
}
