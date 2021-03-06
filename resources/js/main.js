
var autumnModuleHtml = '<div class = "row autumnModule">\
<div class = "form-group col-md-4">\
        <label for="autumn_module_names">Opintojakson nimi</label>\
        <input class="form-control module_name" name="autumn_module_names[]" type="text">\
      </div>\
      <div class = "form-group col-md-2">\
        <label for="autumn_credits">Opintopisteet</label>\
        <input type ="number" name = "autumn_credits[]" class ="form-control" value="1" min="1" max="10" step ="0.5">\
        </div>\
        <div class = "form-group col-md-5">\
        <label for="autumn_subjects">Oppiaine</label>\
        <select name = "autumn_subjects[]" class ="form-control subject-select ">\
                        <option value="Tietojenk&auml;sittelytieteiden tutkinto-ohjelma">Tietojenk&auml;sittelytieteiden tutkinto-ohjelma</option>\
                        <option value="Matematiikan ja tilastotieteen tutkinto-ohjelma">Matematiikan ja tilastotieteen tutkinto-ohjelma</option>\
                        <option value="Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma">Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma</option>\
                        <option value="Bioteknologian tutkinto-ohjelma">Bioteknologian tutkinto-ohjelma</option>\
                    </select>\
        </div>\
        <div class = "form-group col-md-1">\
        <label for="deleteRow">Poista</label>\
        <button type="button" name = "deleteRow" class = "deleteRow btn btn-danger">\
          <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>\
        </button>\
      </div>\
</div>';

var springModuleHtml = '<div class = "row springModule">\
<div class = "form-group col-md-4">\
        <label for="spring_module_names">Opintojakson nimi</label>\
        <input class="form-control module_name" name="spring_module_names[]" type="text">\
      </div>\
      <div class = "form-group col-md-2">\
        <label for="spring_credits">Opintopisteet</label>\
        <input type ="number" name = "spring_credits[]" class ="form-control" value="1" min="1" max="10" step ="0.5">\
        </div>\
        <div class = "form-group col-md-5">\
        <label for="spring_subjects">Oppiaine</label>\
        <select name = "spring_subjects[]" class ="form-control subject-select ">\
                        <option value="Tietojenk&auml;sittelytieteiden tutkinto-ohjelma">Tietojenk&auml;sittelytieteiden tutkinto-ohjelma</option>\
                        <option value="Matematiikan ja tilastotieteen tutkinto-ohjelma">Matematiikan ja tilastotieteen tutkinto-ohjelma</option>\
                        <option value="Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma">Informaatiotutkimuksen ja interaktiivisen median tutkinto-ohjelma</option>\
                        <option value="Bioteknologian tutkinto-ohjelma">Bioteknologian tutkinto-ohjelma</option>\
                    </select>\
        </div>\
        <div class = "form-group col-md-1">\
        <label for="deleteRow">Poista</label>\
        <button type="button" name = "deleteRow" class = "deleteRow btn btn-danger">\
          <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>\
        </button>\
      </div>\
</div>';

$(document).ready(function(){


  $('input[type=radio][name=has_job]').change(function() {
        if (this.value == 'false') {
          $('#work-situation').slideUp()
        }
        else if (this.value == 'true') {
          $('#work-situation').slideDown();
        }
    });





  $('#addAutumnRow').on('click' , function(){

    $(autumnModuleHtml).hide().appendTo('#autumnStudies').fadeIn();
    //$('#autumnStudies').append(springModuleHtml).fadeIn();
  });

  $('#autumnStudies').on('click', 'button.deleteRow', function(){
      $(this).closest('.autumnModule').remove();
  });

  $('#addSpringRow').on('click' , function(){

    $(springModuleHtml).hide().appendTo('#springStudies').fadeIn();
    //$('#autumnStudies').append(springModuleHtml).fadeIn();
  });

  $('#springStudies').on('click', 'button.deleteRow', function(){
      console.log("should remove spring module");
      $(this).closest('.springModule').remove();
  });

});

//preFiller.preFill();
