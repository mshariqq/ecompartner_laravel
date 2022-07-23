@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

    <div class="page-header">
        <h4 class="float-left">Import Leads</h4>
        <p class="float-right">
            <a href="#" class="btn btn-primary"> <i class="fa fa-download" aria-hidden="true"></i> Download Sample</a>
        </p>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Note: Your CSV file must not contain more than 10000 Rows</strong>
            </div>
        </div>
        <div class="col-12">
            <form id="ImportForm" class="card" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="card-body ">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Give it a name</label>
                              <input type="text"
                              required
                                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Ex: Dubai June 2022 Leads">
                              <small id="helpId" class="form-text text-primary">Giving it a name will help you to track your records</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Select the File</label>
                              <input type="file"
                              required
                                class="form-control" name="csv" id="csvFile" aria-describedby="helpId" placeholder="Ex: Dubai June 2022 Leads">
                              <small id="helpId" class="form-text text-danger">File must be in CSV Format & not more than 10000 rows</small>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4">
                            <div style="display: none" id="progressBar" class="progress progress-md mb-3">
                                <div class="progress-bar progress-bar-indeterminate bg-success"></div>
                            </div>
                            <div id="SubmitBar" class="form-group">
                                <label for=""></label>
                                <button type="submit" class="btn btn-success"> 
                                    <i class="fa fa-cog" aria-hidden="true"></i>  
                                    
                                    Start Import
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </form>
        </div>
    </div>
    {{-- action="{{route('leads.import.store')}}" --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ImportForm').submit('click', function(event) {
            event.preventDefault();

            $('#progressBar').show();
            $('#SubmitBar').hide();

            var file_data = $('#csvFile').prop('files')[0];
            var form_data = new FormData($(this)[0]);
            form_data.append('file', file_data);

            $.ajax({
                    url         : '{{route("leads.import.store")}}',
                    dataType    : 'text',           // what to expect back from the PHP script, if anything
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data        : form_data,                         
                    type        : 'post',
                    success     : function(output){
                        console.log(output); 
                        var data = JSON.parse(output);
                        if(data.code == 200 || data.code == '200'){
                            location.href = '{{route("leads.leads-list.index")}}'
                        }else{
                            alert(data.msg);
                        }

                        $('#progressBar').hide();
                        $('#SubmitBar').show();
                    },error: function(res){
                        console.log(res);
                        $('#progressBar').hide();
                        $('#SubmitBar').show();
                    }
            });
        });

        // $('#ImportForm').submit(function(event) {
        //     event.preventDefault();
        //     var formData = new FormData($(this)[0]);
        //     $.ajax({
        //         url: '{{route("leads.import.store")}}',
        //         type: 'POST',
        //         dataType: 'json',
        //         data: formData,
        //         cache : false,
        //         processData: false,
        //         success: function(result)
        //         {
        //             console.log(result);

        //             // location.reload();
        //         },
        //         error: function(data)
        //         {
        //             console.log(data);
        //         }
        //     });

        // });
    </script>

@endsection