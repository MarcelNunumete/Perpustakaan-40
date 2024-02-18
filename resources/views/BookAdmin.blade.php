
@include('layout.header')

<style>

  #exampleFormControlInput1{
    color: #000000;
  }
  .form-group label{
    color: #000000;
  } 

  .mb-3 label{
    color: #000000
  }

</style>

<body class="">
  <div class="wrapper">
    
    @include('layout.sidebar')

    <div class="main-panel">
     
    @include('layout.navbar')

      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Daftar Buku</h4>
                <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah +
                  </button>
                  
                  <!-- Modal create -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content d-flex align-item-center">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLabel">Tambah Buku</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('bookadmin.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Judul</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="judul">
                            </div>
                            <div class="mb-3">
                              <label for="image" class="form-label">Foto</label>
                              <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image">
                              @error('image')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                                
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Penerbit</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="penerbit">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Kategori</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Deskripsi</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="deskripsi">
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                          </form>
                        </div>
                         
                      </div>
                    </div>
                  </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>tanggal</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $book)
                      <tr>
                        <td> {{$loop->iteration}} </td>
                        <td> {{$book->judul}} </td>
                        <td> {{$book->penerbit}} </td>
                        <td> {{$book->kategori}} </td>
                        <td> {{ optional ($book->created_at)->format('D M Y')}} </td>
                        <td>
                         <div class="row">
                          {{-- button edit --}}
                             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$book->id}}">Edit</button>

                             {{-- button hapus --}}
                             <form action="/bookadmin/{{$book->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <input type="text" value="{{$book->id}}" name="book_id" hidden>
                             <button type="submit" class="btn btn-primary btn-sm mr-2 ml-2">Hapus</button>
                            </form>

                            {{-- button lihat --}}
                             <a href="{{ route('bookadmin.show', $book->id)}}" class="btn btn-primary btn-sm">Lihat</a>
                             
                           <!-- Modal edit -->
                           <div class="modal fade" id="edit{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                               <div class="modal-content d-flex align-item-center">
                                 <div class="modal-header">
                                   <h3 class="modal-title" id="exampleModalLabel">Tambah Buku</h3>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                   </button>
                                 </div>
                                 <div class="modal-body">
                                   <form action="{{ route('bookadmin.update', $book)}}" method="POST">
                                     @csrf
                                     @method('PATCH')
                                     <div class="form-group">
                                       <label for="exampleFormControlInput1">Judul</label>
                                       <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" value="{{$book->judul}}">
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleFormControlInput1">Penerbit</label>
                                       <input type="text" class="form-control" id="exampleFormControlInput1" name="penerbit" value="{{$book->penerbit}}">
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleFormControlInput1">Kategori</label>
                                       <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" value="{{$book->kategori}}">
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleFormControlInput1">Deskripsi</label>
                                       <input type="text" class="form-control" id="exampleFormControlInput1" name="deskripsi" value="{{$book->deskripsi}}">
                                     </div>
                                     <button class="btn btn-primary" type="submit">Submit</button>
                                   </form>
                                 </div>
                                  
                               </div>
                             </div>
                           </div>
                           {{-- end edit modal --}}
  
                             
                         </div>
                        </td>                  
                       </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card  card-plain">
              <div class="card-header">
                <h4 class="card-title"> Table on Plain Background</h4>
                <p class="category"> Here is a subtitle for this table</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Name
                        </th>
                        <th>
                          Country
                        </th>
                        <th>
                          City
                        </th>
                        <th class="text-center">
                          Salary
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Dakota Rice
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <td class="text-center">
                          $36,738
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Minerva Hooper
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-center">
                          $23,789
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Sage Rodriguez
                        </td>
                        <td>
                          Netherlands
                        </td>
                        <td>
                          Baileux
                        </td>
                        <td class="text-center">
                          $56,142
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Philip Chaney
                        </td>
                        <td>
                          Korea, South
                        </td>
                        <td>
                          Overland Park
                        </td>
                        <td class="text-center">
                          $38,735
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Doris Greene
                        </td>
                        <td>
                          Malawi
                        </td>
                        <td>
                          Feldkirchen in Kärnten
                        </td>
                        <td class="text-center">
                          $63,542
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Mason Porter
                        </td>
                        <td>
                          Chile
                        </td>
                        <td>
                          Gloucester
                        </td>
                        <td class="text-center">
                          $78,615
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Jon Porter
                        </td>
                        <td>
                          Portugal
                        </td>
                        <td>
                          Gloucester
                        </td>
                        <td class="text-center">
                          $98,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      @include('layout.footer')

    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
          <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
            Documentation
          </a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
          <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div>

@include('layout.script')

</body>

</html>