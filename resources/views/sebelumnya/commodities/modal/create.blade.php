<!-- Modal -->
<div class="modal fade" id="commodity_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Baru Surat Jalan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form action="{{ route('addmorePost') }}" method="POST">
          @csrf
          <div class="row">

            <div class="col-lg-7">
              <div class="form-group">

                <label for="acquisition">Untuk Perusahaan</label>

                <select class="custom-select" id="school_operational_assistance_id_create">
                  @foreach($school_operational_assistances as $school_operational_assistance)
                  <option value="{{ $school_operational_assistance->id }}">{{ $school_operational_assistance->name }}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">

                <label for="item_code">Surat Jalan</label>
                <input type="text" autocomplete="off" name="item_code" class="form-control" id="item_code_create">

              </div>
            </div>
            
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="name">No. PO</label>
                <input type="text" autocomplete="off" class="form-control" id="name_create">
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label for="brand">No. PR</label>
                <input type="text" autocomplete="off" class="form-control" id="brand_create">
              </div>
            </div>


          </div>

          <hr>

          <table id="dynamicTable"> 

            <span class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="quantity">Name And Specification</label>
                  <input type="text" name="addmore[0][name]" placeholder="Enter your Name" class="form-control">
                </div>
              </div>

              <div class="col-lg-2">
                <div class="form-group">
                  <label for="price">Qty</label>
                  <input type="text" name="addmore[0][qty]" placeholder="Enter your Qty" class="form-control">
                </div>
              </div>

              <div class="col-lg-1">
                <div class="form-group">
                  <label for="price_per_item">Unit</label>
                  <input type="text" name="addmore[0][price]" placeholder="Enter your Price" class="form-control">
                </div>
              </div>

              <div class="col-lg-2">
                <div class="form-group">
                  <label for="price_per_item">Unit Price</label>
                  <input type="text" name="addmore[0][price]" placeholder="Enter your Price" class="form-control">
                </div>
              </div>

              <div class="col-lg-1">
                  <div class="form-group">
                    <label for="price_per_item">Opsi</label>
                    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                  </div>
              </div>
            </span>
          </table>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="note">Keterangan</label>
                <textarea class="form-control" id="note_create" rows="3"></textarea>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append(`
        <span class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <input type="text" name="addmore['+i+'][name]"class="form-control">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <input type="text" name="addmore['+i+'][qty]" class="form-control">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <input type="text" name="addmore['+i+'][price]" class="form-control">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <input type="text" name="addmore['+i+'][price]" class="form-control">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <button type="button" class="btn btn-danger remove-tr">Remove</button>
          </div>
        </div>
        </span>`);
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('span').remove();
    });  
   
</script>