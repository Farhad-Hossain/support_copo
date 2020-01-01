<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History |</title>


    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets') }}/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets') }}/form-validation.css" rel="stylesheet">

    <style>
        td hr{
            margin: 0px; padding: 0px;
        }
        body{
            font-family: "Times New Roman", Times, serif;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div>
            <h4 style="text-align: center; padding: 10px; background: green; color: white;">EIIN : {{$eiin}}</h4>
        </div>

        <div>
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th colspan="3">Name | Phone | Email</th>
                        <th>Board | EIIN | Service</th>
                        <th colspan="2">Message | Feedback Message</th>
                        <th>Status | By</th>
                        <th>Documents</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($enqueries as $enquery)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td colspan="3">{{ $enquery->name }} <hr /> {{ $enquery->phone }} <hr /> {{ $enquery->email }}</td>
                        <td class="align-middle">
                            {{ $enquery->board_name->name }} <hr/>
                            {{ $enquery->eiin }} <hr />
                            {{ $enquery->service }}
                        </td>
                        
                        <td colspan="2" class="align-middle">{{ $enquery->message }} <div style="border: 1px solid lightgrey;"></div> {{ $enquery->feedback_message ?? 'n/a' }} </td>
                        <td class="align-middle">
                            @if( $enquery->status == 0 )
                                <span style="color: red;">Pending</span>
                            @elseif( $enquery->status == 1 )
                                <span style="color: deeppink;">Sms Sent</span>
                            @elseif( $enquery->status == 2 )
                                <span style="color: green">Success</span>
                            @elseif( $enquery->status == 3 )
                                <span style="color: red;">Rejected</span>
                            @endif
                            <hr />
                            <span style="color: red;">by {{$enquery->actioned_user['name']}}</span>
                            
                        </td>
                        <td class="align-middle">
                            @if($enquery->doc1 != 'n/a')
                                <a href="{{ asset('assets/documents') }}/{{$enquery->doc1}}" target="_blank">{{ "doc-1" }}</a>
                            @else
                                {{ 'n/a' }}
                            @endif
                            <hr />
                            @if($enquery->doc2 != 'n/a')
                                <a href="{{ asset('assets/documents') }}/{{$enquery->doc2}}" target="_blank">{{ "doc-2" }}</a>
                            @else
                                {{ 'n/a' }}
                            @endif
                        </td>
                        
                        <td>{{$enquery->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        
    </div>
</body> 
</html>