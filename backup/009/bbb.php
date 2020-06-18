<link href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>

<style>
select {
  width: 100%;
}
</style>

<div>
  <div class="form-group row">
    <label class="col-sm-2">
      Methods
    </label>

    <div class="col-sm-10">
      <button id="setSelectsBtn" class="btn btn-secondary">SetSelects</button>
      <button id="getSelectsBtn" class="btn btn-secondary">GetSelects</button>
    </div>
  </div>





  <div class="form-group row">
    
    <label class="col-sm-2">
    Basic Select
    </label>

    <div class="col-sm-10">
      <select id="select1" multiple="multiple">
        <option value="1">January</option>
        <option value="2">February</option>    
      </select>
    </div>

    

  </div>
</div>



<script>
  var $select = $('#select1')

  $(function() {
    $select.multipleSelect()

    $('#setSelectsBtn').click(function () {
      $select.multipleSelect('setSelects', [1, 3])
    })

    $('#getSelectsBtn').click(function () {
      alert('Selected values: ' + $select.multipleSelect('getSelects'))
      alert('Selected texts: ' + $select.multipleSelect('getSelects', 'text'))
    })
  })
</script>