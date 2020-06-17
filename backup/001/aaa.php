<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


</head>
<body>


<style>
  select {
    width: 100%;
  }
</style>

<div>
  <form>
    <div class="form-group row">
      <label class="col-sm-2">
        Single Select
      </label>

      <div class="col-sm-10">
        <select name="select1">
          <option value="1">First</option>
          <option value="2">Second</option>
          <option value="3">Third</option>
          <option value="4">Fourth</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2">
        Multiple Select
      </label>

      <div id="apple" class="col-sm-10">
        <select name="select2" multiple required>
          <option value="1">First</option>
          <option value="2">Second</option>
          <option value="3">Third</option>
          <option value="4">Fourth</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10 offset-sm-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

<script>
  $(function () {
    $('select').multipleSelect()

    $('form').submit(function () {
     // alert($(this).serialize());
     //alert('Selected texts: ' + $('#select1').multipleSelect('getSelects', 'text'));
     aaaa=$('select').multipleSelect('getSelects', 'text');
     console.log(aaaa);
     
      // b=$(this).serialize();
      // console.log(b);
      
      data =JSON.stringify($(this).serialize());
      console.log(data);
      return false
    })
  //   function onSubmit( form ){
  //   var data = JSON.stringify( $(form).serializeArray() ); //  <-----------
  //   console.log( data );
  //   return false; //don't submit
  // }
  
  })
  function aaab(){
    aaab=$('#apple').multipleSelect('getSelects', 'text');
    console.log(aaab);
  }

  function axiosTest() {
    axios.post('testdb2.php', {
        data: {
          action: 'axiosTest',
        },
      })
      .then(function (response) {
        console.log(response);
        console.log('123');
        
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  function aaa() {
  axios({
      method: 'POST',
      url: 'testdb2',
      params: {
        apple: 'orange',
      }
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });

  }
</script>


</body>
</html>