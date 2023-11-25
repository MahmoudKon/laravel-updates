@extends('layouts.app')

@section('content')
    <div class="card">
        <h3 class="text-center"> التحقق من وجود تحديث </h3>

        <div id='show-updates-details'>
            <div class="row">
                <div class="offset-4 col-md-4">
                    <div class="card text-left">
                        <div class="card-body" id="show-draw-section"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(function() {
        let new_version = {row: null};
        function checkUpdate() {
            $.ajax({
                url: "http://127.0.0.1:8000/api/get/update",
                type: "GET",
                success: function(response) {
                    if (response.row) {
                        new_version.row = response.row;
                        $('#show-draw-section').html(drawSection(response.row));
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

        function drawSection(row)
        {
            return `<h4 class="card-title" id="update-date">${row.date}</h4>
                    <p class="card-text">${row.id}</p>
                    <p class="card-text">${row.about}</p>
                    <p class="card-text">${row.size}</p>
                    <p class="card-text">${row.name}</p>
                    <p class="card-text">${row.version}</p>
                    <p class="card-text"><a href="{{ route('api.do.update') }}" id="do-update">Make Update</a></p>`;
        }

        $('body').on('click', '#do-update', function(e) {
            e.preventDefault();

            if (! new_version.row) return ;
            $('#show-updates-details').addClass('load');
            $.ajax({
                url: $(this).attr('href'),
                type: "POST",
                data: new_version,
                success: function(response) {
                    $('#show-updates-details').removeClass('load');
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        checkUpdate();
    });
</script>
@endsection
