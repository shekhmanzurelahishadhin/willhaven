<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Store Data</title>
  </head>
  <body>
    <?php
      use Stichoza\GoogleTranslate\GoogleTranslate;
      $lang = new GoogleTranslate('de');
    ?>
    <div class="container">
      @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                {{-- EN code starts --}}
                <table class="table table-bordered">
                  <a href="{{url('/add_data')}}" class="btn btn-primary my-3">Add Data</a>
                  @if(Session::has('scc'))
                    <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                  @endif
                  <thead>
                    <tr>
                      <th scope="col">User ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key=>$value)
                    <tr>
                      <th scope="row">{{$value->id}}</th>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>
                        <a href="{{url('/edit_data/'.$value->id)}}" class="btn btn-success" style="width: 120px;">Edit</a>
                        <a href="{{url('/del_data/'.$value->id)}}" onclick = "return confirm('Are you really want to delete?')" class="btn btn-danger" style="width: 120px;">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- EN code ends --}}

            @elseif($language->language=='gr')
                {{-- GR code starts --}}
                <table class="table table-bordered">
                  <a href="{{url('/add_data')}}" class="btn btn-primary my-3">Daten hinzufügen</a>
                  @if(Session::has('scc'))
                    <p class="alert alert-success" style="font-weight:bold;"><?php echo $lang->translate(Session::get('scc')); ?></p>
                  @endif
                  <thead>
                    <tr>
                      <th scope="col">Benutzer-ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Aktion</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key=>$value)
                    <tr>
                      <th scope="row">{{$value->id}}</th>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>
                        <a href="{{url('/edit_data/'.$value->id)}}" class="btn btn-success" style="width: 120px;">Bearbeiten</a>
                        <a href="{{url('/del_data/'.$value->id)}}" onclick = "return confirm('Wollen Sie wirklich löschen?')" class="btn btn-danger" style="width: 120px;">Löschen</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- GR code ends --}}
            @endif
        @endif
      @endforeach

        {{$data->links()}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>