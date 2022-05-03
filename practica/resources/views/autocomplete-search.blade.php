<!DOCTYPE html> 
<html> 
    <head> 
    <title>Laravel 9 Autocomplete Textbox From Database with jQuery ui- Tutsmake.com</title> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript"> var siteUrl = "{{url('/')}}"; </script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    </head>

    <body> 
        <div class="container mt-4"> 
            <div class="card"> 
                <div class="card-header text-center font-weight-bold"> 
                    <h2>Laravel 9 Autocomplete Textbox From Database using jQuery ui- Tutsmake.com</h2> 
                </div> 
                <div class="card-body"> 
                    <form name="autocomplete-textbox" id="autocomplete-textbox" method="post" action="#"> 
                        @csrf 
                        <div class="form-group"> 
                            <label for="exampleInputEmail1">Search Product By Name</label> 
                            <input type="text" id="name" name="name" class="typeahead form-control"> 
                        </div>
                        
                        <script type="text/javascript">
                            var path = "{{ route('autocomplete') }}";
                            $('input.typeahead').typeahead({
                                source: function(query, process){
                                    return $.get(path, {
                                        query: query 
                                    }, function (data){
                                            return process(data);
                                        });
                                }
                            });
                        </script>

                    </form> 
                </div> 
            </div> 
        </div> 
        <!--<script src="{{ asset('auto.js') }}"></script> -->
    </body> 
    </html>