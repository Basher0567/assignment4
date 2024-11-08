<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
$(document).ready(function(){
    /*$(document).on('keyup',function(e){
        e.preventDefault();
        let $search_string=$('#search').val();
        //console.log(search_string);
        $.ajax({
            url:"{{route('searchProduct')}}",
            method:'GET',
            data:{'search_string':search_string},
            success:function(res){
                $('.table-data').html(res);
            }
        });
    })*/

    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            method:'get',
            url::'{{route('searchProduct')}}',
            data:{'search':$value},
            success:function(data){
                console.log(data);
                $('#Content').html(data);
            }
        });
    });
});
</script>
