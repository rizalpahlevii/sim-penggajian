
// Tampil Modal Petugas
 $(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e){
      
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
        type:'post',
        url:'content/modal/modal_pgw.php',
        data: 'rowid='+rowid,
        success: function(data){
          $('.fatched-data').html(data)
        }
      });
    });

  });