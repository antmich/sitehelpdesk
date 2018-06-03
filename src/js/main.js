$(document).ready(function(){

    /*Sélection de la catégorie via les boutons*/
    $('#btn_Office365').click(function(){
        document.getElementById('box_cat').value = 'Office365';
        $('#form-infos').css ({
            'visibility' : 'visible',
            'border': '2px solid #FFDB4A'
        });
        $('#categorie').css ({
            'border' : 'none'
        })
    });
    $('#btn_APSchool').click(function(){
        document.getElementById('box_cat').value = 'AP School';
        $('#form-infos').css ({
            'visibility' : 'visible',
            'border': '2px solid #FF2B56'
        });
        $('#categorie').css ({
            'border' : 'none'
        })
    });
    $('#btn_Uniflow').click(function(){
        document.getElementById('box_cat').value = 'Canon Uniflow';
        $('#form-infos').css ({
            'visibility' : 'visible',
            'border': '2px solid #276CDA'
        });$('#categorie').css ({
            'border' : 'none'
        })
    });
    $('#btn_Intervention').click(function(){
        document.getElementById('box_cat').value = 'Intervention technique';
        $('#form-infos').css ({
            'visibility' : 'visible',
            'border': '2px solid #2F2F2F'
        });
        $('#categorie').css ({
            'border' : 'none'
        })
    });
    /*Sélection de la catégorie via la liste dans le formulaire*/
    $('#box_cat').click(function(){
        var textselectionne = document.getElementById('box_cat').value;
        if (textselectionne == "Office365")
        {
            $('#form-infos').css ({
                'border': '2px solid #FFDB4A'
            });
        }
        else if (textselectionne == "AP School")
        {
            $('#form-infos').css ({
                'border': '2px solid #FF2B56'
            });
        }
        else if (textselectionne == "Canon Uniflow")
        {
            $('#form-infos').css ({
                'border': '2px solid #276CDA'
            });
        }
        else
        {
            $('#form-infos').css ({
                'border': '2px solid #2F2F2F'
            });
        }
    });

    /*Annulation du formulaire */
    $('#btn_annuler').click(function(){
        $('#formulaire')[0].reset();
    });

    /*Notification après ouverture ticket*/
    $('#close_notif').click(function(){
        $('#notif').css ({
            'display' : 'none'
        });
    });
    
    /*Afficher les boutons radio pour le changement d'état*/
    $('#chg_etat').click(function(){
        if (document.getElementById('chg_etat').checked)
        {
            document.getElementById('radio_etat').style.display = "block";
        }
        else
        {
            document.getElementById('radio_etat').style.display = "none";
        }
    });
});