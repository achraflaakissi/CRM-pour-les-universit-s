function FiltrerCD()
{
    $("#filtrer").hide();
    $('#table_body').html("");
    $.ajax({
            type:'POST',
            data:{
                'Nom' : $("#Nom").val(),
                'Test' : $("#test").val(),
                'Inscrit' : $("#inscrit").val(),
                'Date_du_contact' : $("#date_du_contact").val(),
                'Test_passe' : $("#test_passe").val(),
                'Date_Affectation' : $("#date_affectation").val(),
                'Prenom' : $("#Prenom").val(),
                'nature_contact' : $("#nature_contact").val(),
                'Marche' : $("#Marche").val(),
                'Tel' : $("#Tel").val(),
                'GSM' : $("#GSM").val(),
                'Contact_Suivi_Par' : $("#Contact_Suivi_Par").val(),
                'Nom_Commencant' : $("#Nom_Commencant").val()
            },
            success:function(data)
            {
                $('#table_body').html("");
                $('#table_body').html(data);
                $("#filtrer").show();
                activerdatatablesforme();
            }
    });
}
function valider_auto_rdv(id,valifdation_rdv)
{
     $.ajax({
                 type:'POST',
                data:{ 
                    'valifdation_rdv_id' : id,
                    'valifdation_rdv' : valifdation_rdv
                },
                success:function(data)
                {
                     if(data.validation)
                    {
                        location.reload();
                    }
                }
            });
}
function getfichecontact_auto_cmp_appel(campagne,stat,id,type_contact)
{
    
    if(stat==1)
    {
        if(campagne!="")
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagne' : campagne,
                    'type_contact' : type_contact
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        $("#date_rdv").val("");
                        $("#heure_rdv").val("");
                        $("#inscription_rdv").val("");
						$('#ntel').val("");
						$('#etapephoning_ans').val("");
						$('#observation_ans').val("");
						$('#nemail').val("");
                        $('#observation').val("");
                        $("#s1tc").val("");
                        $("#s2tc").val("");
                        $("#annuelletc").val("");
                        $("#s1bac1").val("");
                        $("#s2bac1").val("");
                        $("#annuellebac1").val("");
                        $("#noteregional").val("");
                        $("#s1bac2").val("");
                        $("#s2bac2").val("");
                        $("#annuellebac2").val("");
                        $("#notenational").val("");
                        $("#notegenerale").val("");
						$("#send_email").removeAttr("disabled");
						$('#ntel').val(data.data.Ntel);
						$('#nemail').val(data.data.Nemail);
						$('#nom').val(data.data.Nom);
                        $('#prenom').val(data.data.Prenom);
                        $('#nature_contact').val(data.data.Nature_de_Contact);
                        $('#ville').val(data.data.Ville);
                        $('#ville_lycee').val(data.data.Ville_Lycee);
                        $('#formation_containaire').html(data.data.Formation_Demmandee);
                        $('#niveau_etudes').val(data.data.Niveau_des_etudes);
                        $('#gsm').val(data.data.GSM);
                        $('#telephone').val(data.data.Tel);
                        $('#tel_pere').val(data.data.Tel_Pere);
                        $('#tel_mere').val(data.data.Tel_Mere);
                        $('#email').val(data.data.Email);
                        $('#etatpephonig').html(data.data.etphoning);
                        $('#adresse').val(data.data.Adresse);
                        $('#scripte_content').html(data.data.script);
                        $('#content_email').val(data.data.email_send);
                        $('#objet_email').val(data.data.object_send);
                        for(k=0;k<data.data.Observations.length;k++)
                        {
                            $('#observation_ans').val("+ "+data.data.Observations[k]+"\n"+$('#observation_ans').val());
                        }
                        if(data.data.Etape_Phoning!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning actuale : "+data.data.Etape_Phoning);}
                        if((data.data.Etape_Phoning1)!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning1 : "+data.data.Etape_Phoning1);}
                        if(data.data.Etape_Phoning2!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning2 : "+data.data.Etape_Phoning2);}
                        if(data.data.Etape_Phoning3!=null){ $('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning3 : "+data.data.Etape_Phoning3);}
                        if(data.data.Etape_Phoning4!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning4 : "+data.data.Etape_Phoning4);}
                        if(data.data.Etape_Phoning5!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning5 : "+data.data.Etape_Phoning5);}
                        if(data.data.Etape_Phoning6!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning6 : "+data.data.Etape_Phoning6);}
                        if(data.data.Etape_Phoning7!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning7 : "+data.data.Etape_Phoning7);}
                        if(data.data.Etape_Phoning8!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning8 : "+data.data.Etape_Phoning8);}
                        if(data.data.Etape_Phoning9!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning9 : "+data.data.Etape_Phoning9);}
                        if(data.data.Etape_Phoning10!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning10 : "+data.data.Etape_Phoning10);}
                        $("#s1tc").val(data.data.s1tc);
                        $("#s2tc").val(data.data.s2tc);
                        $("#annuelletc").val(data.data.annuelletc);
                        $("#s1bac1").val(data.data.s1bac1);
                        $("#s2bac1").val(data.data.s2bac1);
                        $("#annuellebac1").val(data.data.annuellebac1);
                        $("#noteregional").val(data.data.noteregional);
                        $("#s1bac2").val(data.data.s1bac2);
                        $("#s2bac2").val(data.data.s2bac2);
                        $("#annuellebac2").val(data.data.annuellebac2);
                        $("#notenational").val(data.data.notenational);
                        $("#notegenerale").val(data.data.notegenerale);
						$('#send_email').show();
                        $('#btn-save').attr("onclick","getfichecontact_auto_cmp_appel('"+campagne+"',0,'"+data.data.id+"','"+type_contact+"')");
                        console.log(data.data);
                        //$('#telesip').attr("href","sip:"+data.data.Tel);
                        //$('#telpereesip').attr("href","sip:"+data.data.Tel_Pere);
                        //$('#telemeresip').attr("href","sip:"+data.data.Tel_Mere);
                        //$('#telesip').css("background_color","#50de9c");
                        $('#telesip .fa').css("color","white");
                        if(data.data.GSM != "")
                        {
                        window.location.replace("sip:"+data.data.GSM);
                        }
                        
                    }
                    else{
                        alert("La campagne est compléte");
                    }
                }
            });
        }
        else
        {
            window.location.replace("/");
        }
    }
    else if(stat==0)
    {
        date_rdv=$("#date_rdv").val();
        heure_rdv=$("#heure_rdv").val();
        inscription_rdv=$("#inscription_rdv").val();
        s1tc=$("#s1tc").val();
        s2tc=$("#s2tc").val();
        annuelletc=$("#annuelletc").val();
        s1bac1=$("#s1bac1").val();
        s2bac1=$("#s2bac1").val();
        annuellebac1=$("#annuellebac1").val();
        noteregional=$("#noteregional").val();
        formation_demandee=$("#formation_demandee").val();
        s1bac2=$("#s1bac2").val();
        s2bac2=$("#s2bac2").val();
        annuellebac2=$("#annuellebac2").val();
        notenational=$("#notenational").val();
        notegenerale=$("#notegenerale").val();
        test_notes=true;
        if(date_rdv=="")
        {
            status="NA";
        }
        else if (date_rdv!="" && heure_rdv!=""  && inscription_rdv!="")
        {
            status="Rendez vous "+inscription_rdv;
        }
        else
        {
            alert("Merci de verifier les elements de rendez vous ...");
        }
        if(!test_notes)
        {
            alert("Merci de verifier les notes ...");
        }
        else
        {
            etatpephonig="";
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : campagne,
                    'date_rdv' : date_rdv,
                    'heure_rdv' : heure_rdv,
                    'inscription_rdv' : inscription_rdv,
                    'status' : status,
                    'type_contact' : type_contact,
                    'etapephoning' : etatpephonig,
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val(),
                    's1tc': $("#s1tc").val(),
                    's2tc': $("#s2tc").val(),
                    'annuelletc':$("#annuelletc").val(),
                    'formation_demandee':formation_demandee,
                    's1bac1':$("#s1bac1").val(),
                    's2bac1':$("#s2bac1").val(),
                    'annuellebac1':$("#annuellebac1").val(),
                    'noteregional':$("#noteregional").val(),
                    's1bac2':$("#s1bac2").val(),
                    's2bac2':$("#s2bac2").val(),
                    'annuellebac2':$("#annuellebac2").val(),
                    'notenational':$("#notenational").val(),
                    'notegenerale':$("#notegenerale").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert(" Opération effectuée avec succès … ");
                        window.close();
                    }
                }
            });
        }
    }
    else if(stat==5)
    {
        if($('#etatpephonig').val()=="")
        {
            alert("Merci de Selectionner Etape Phoning");
        }
        else
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : campagne,
                    'etapephoning' : $('#etatpephonig').val(),
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert(" Opération effectuée avec succès … ");
                    }
                }
            });
        }
    }

}
function getfichecontact_auto_cmp(campagne,stat,id,type_contact)
{
    
    if(stat==1)
    {
        if(campagne!="")
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagne' : campagne,
                    'type_contact' : type_contact
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        $("#date_rdv").val("");
                        $("#heure_rdv").val("");
                        $("#inscription_rdv").val("");
						$('#ntel').val("");
						$('#etapephoning_ans').val("");
						$('#observation_ans').val("");
						$('#nemail').val("");
                        $('#observation').val("");
                        $("#s1tc").val("");
                        $("#s2tc").val("");
                        $("#annuelletc").val("");
                        $("#s1bac1").val("");
                        $("#s2bac1").val("");
                        $("#annuellebac1").val("");
                        $("#noteregional").val("");
                        $("#s1bac2").val("");
                        $("#s2bac2").val("");
                        $("#annuellebac2").val("");
                        $("#notenational").val("");
                        $("#notegenerale").val("");
						$("#send_email").removeAttr("disabled");
						$('#ntel').val(data.data.Ntel);
						$('#nemail').val(data.data.Nemail);
						$('#nom').val(data.data.Nom);
                        $('#prenom').val(data.data.Prenom);
                        $('#nature_contact').val(data.data.Nature_de_Contact);
                        $('#ville').val(data.data.Ville);
                        $('#ville_lycee').val(data.data.Ville_Lycee);
                        $('#formation_containaire').html(data.data.Formation_Demmandee);
                        $('#niveau_etudes').val(data.data.Niveau_des_etudes);
                        $('#gsm').val(data.data.GSM);
                        $('#telephone').val(data.data.Tel);
                        $('#tel_pere').val(data.data.Tel_Pere);
                        $('#tel_mere').val(data.data.Tel_Mere);
                        $('#email').val(data.data.Email);
                        $('#etatpephonig').html(data.data.etphoning);
                        $('#adresse').val(data.data.Adresse);
                        $('#scripte_content').html(data.data.script);
                        $('#content_email').val(data.data.email_send);
                        $('#objet_email').val(data.data.object_send);
                        for(k=0;k<data.data.Observations.length;k++)
                        {
                            $('#observation_ans').val("+ "+data.data.Observations[k]+"\n"+$('#observation_ans').val());
                        }
                        if(data.data.Etape_Phoning!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning actuale : "+data.data.Etape_Phoning);}
                        if((data.data.Etape_Phoning1)!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning1 : "+data.data.Etape_Phoning1);}
                        if(data.data.Etape_Phoning2!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning2 : "+data.data.Etape_Phoning2);}
                        if(data.data.Etape_Phoning3!=null){ $('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning3 : "+data.data.Etape_Phoning3);}
                        if(data.data.Etape_Phoning4!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning4 : "+data.data.Etape_Phoning4);}
                        if(data.data.Etape_Phoning5!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning5 : "+data.data.Etape_Phoning5);}
                        if(data.data.Etape_Phoning6!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning6 : "+data.data.Etape_Phoning6);}
                        if(data.data.Etape_Phoning7!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning7 : "+data.data.Etape_Phoning7);}
                        if(data.data.Etape_Phoning8!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning8 : "+data.data.Etape_Phoning8);}
                        if(data.data.Etape_Phoning9!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning9 : "+data.data.Etape_Phoning9);}
                        if(data.data.Etape_Phoning10!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning10 : "+data.data.Etape_Phoning10);}
                        $("#s1tc").val(data.data.s1tc);
                        $("#s2tc").val(data.data.s2tc);
                        $("#annuelletc").val(data.data.annuelletc);
                        $("#s1bac1").val(data.data.s1bac1);
                        $("#s2bac1").val(data.data.s2bac1);
                        $("#annuellebac1").val(data.data.annuellebac1);
                        $("#noteregional").val(data.data.noteregional);
                        $("#s1bac2").val(data.data.s1bac2);
                        $("#s2bac2").val(data.data.s2bac2);
                        $("#annuellebac2").val(data.data.annuellebac2);
                        $("#notenational").val(data.data.notenational);
                        $("#notegenerale").val(data.data.notegenerale);
						$('#send_email').show();
                        $('#btn-save').attr("onclick","getfichecontact_auto_cmp('"+campagne+"',0,'"+data.data.id+"','"+type_contact+"')");
                        console.log(data.data);
                        //$('#telesip').attr("href","sip:"+data.data.Tel);
                        //$('#telpereesip').attr("href","sip:"+data.data.Tel_Pere);
                        //$('#telemeresip').attr("href","sip:"+data.data.Tel_Mere);
                        //$('#telesip').css("background_color","#50de9c");
                        $('#telesip .fa').css("color","white");
                        if(data.data.GSM != "")
                        {
                        window.location.replace("sip:"+data.data.GSM);
                        }
                        
                    }
                    else{
                        alert("La campagne est compléte");
                        window.location.replace("/");
                    }
                }
            });
        }
        else
        {
            window.location.replace("/");
        }
    }
    else if(stat==0)
    {
        date_rdv=$("#date_rdv").val();
        heure_rdv=$("#heure_rdv").val();
        inscription_rdv=$("#inscription_rdv").val();
        s1tc=$("#s1tc").val();
        s2tc=$("#s2tc").val();
        annuelletc=$("#annuelletc").val();
        s1bac1=$("#s1bac1").val();
        s2bac1=$("#s2bac1").val();
        annuellebac1=$("#annuellebac1").val();
        noteregional=$("#noteregional").val();
        formation_demandee=$("#formation_demandee").val();
        s1bac2=$("#s1bac2").val();
        s2bac2=$("#s2bac2").val();
        annuellebac2=$("#annuellebac2").val();
        notenational=$("#notenational").val();
        notegenerale=$("#notegenerale").val();
        test_notes=true;
        if(date_rdv=="")
        {
            status="NA";
        }
        else if (date_rdv!="" && heure_rdv!=""  && inscription_rdv!="")
        {
            status="Rendez vous "+inscription_rdv;
        }
        else
        {
            alert("Merci de verifier les elements de rendez vous ...");
        }
        if(!test_notes)
        {
            alert("Merci de verifier les notes ...");
        }
        else
        {
            etatpephonig="";
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : campagne,
                    'date_rdv' : date_rdv,
                    'heure_rdv' : heure_rdv,
                    'inscription_rdv' : inscription_rdv,
                    'status' : status,
                    'type_contact' : type_contact,
                    'etapephoning' : etatpephonig,
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val(),
                    's1tc': $("#s1tc").val(),
                    's2tc': $("#s2tc").val(),
                    'annuelletc':$("#annuelletc").val(),
                    'formation_demandee':formation_demandee,
                    's1bac1':$("#s1bac1").val(),
                    's2bac1':$("#s2bac1").val(),
                    'annuellebac1':$("#annuellebac1").val(),
                    'noteregional':$("#noteregional").val(),
                    's1bac2':$("#s1bac2").val(),
                    's2bac2':$("#s2bac2").val(),
                    'annuellebac2':$("#annuellebac2").val(),
                    'notenational':$("#notenational").val(),
                    'notegenerale':$("#notegenerale").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        getfichecontact_auto_cmp(campagne,1,0,type_contact);
                    }
                }
            });
        }
    }
    else if(stat==5)
    {
        if($('#etatpephonig').val()=="")
        {
            alert("Merci de Selectionner Etape Phoning");
        }
        else
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : campagne,
                    'etapephoning' : $('#etatpephonig').val(),
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert(" Opération effectuée avec succès … ");
                    }
                }
            });
        }
    }

}
function FiltrerCDI()
{
    $("#filtrer").hide();
    $('#table_body').html("");
    $.ajax({
            type:'POST',
            data:{
                'Nom' : $("#Nom").val(),
                'Prenom' : $("#Prenom").val(),
                'nature_contact' : $("#nature_contact").val(),
                'Marche' : $("#Marche").val(),
                'Tel' : $("#Tel").val(),
                'GSM' : $("#GSM").val(),
                'Contact_Suivi_Par' : $("#Contact_Suivi_Par").val(),
                'Nom_Commencant' : $("#Nom_Commencant").val()
            },
            success:function(data)
            {
                $('#table_body').html("");
                $('#table_body').html(data);
                $("#filtrer").show();
                activerdatatablesforme();
            }
    });
}
function getgraph_rendez_vous_week_by_user()
{
    $.ajax({
            type:'POST',
            data:{
                'getgraph_rendez_vous_week_by_user' : 'getgraph_rendez_vous_week_by_user'
            },
            success:function(data)
            {
                var colors = Highcharts.getOptions().colors,
                    categories = data.categories ,
                    data = data.data_global ,
                    browserData = [],
                    versionsData = [],
                    i,
                    j,
                    dataLen = data.length,
                    drillDataLen,
                    brightness;
                
                
                // Build the data arrays
                for (i = 0; i < dataLen; i += 1) {
                
                    // add browser data
                    browserData.push({
                        name: categories[i],
                        y: data[i].y,
                        color: data[i].color
                    });
                
                    // add version data
                    drillDataLen = data[i].drilldown.data.length;
                    for (j = 0; j < drillDataLen; j += 1) {
                        brightness = 0.2 - (j / drillDataLen) / 5;
                        versionsData.push({
                            name: data[i].drilldown.categories[j],
                            y: data[i].drilldown.data[j],
                            color: Highcharts.Color(data[i].color).brighten(brightness).get()
                        });
                    }
                }
                
                // Create the chart
                Highcharts.chart('container1', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Les Rendez-Vous de la Semaine Par Type (Detail)'
                    },
                    subtitle: {
                        text: ''
                    },
                    yAxis: {
                        title: {
                            text: 'Total percent market share'
                        }
                    },
                    plotOptions: {
                        pie: {
                            shadow: false,
                            center: ['50%', '50%']
                        }
                    },
                    tooltip: {
                        valueSuffix: '%'
                    },
                    series: [{
                        name: 'Total',
                        data: browserData,
                        size: '60%',
                        dataLabels: {
                            formatter: function () {
                                return this.y > 5 ? this.point.name : null;
                            },
                            color: '#ffffff',
                            distance: -30
                        }
                    }, {
                        name: 'Utilisateur',
                        data: versionsData,
                        size: '80%',
                        innerSize: '60%',
                        dataLabels: {
                            formatter: function () {
                                // display only if larger than 1
                                return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
                                    this.y + '%' : null;
                            }
                        },
                        id: 'versions'
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 400
                            },
                            chartOptions: {
                                series: [{
                                    id: 'versions',
                                    dataLabels: {
                                        enabled: false
                                    }
                                }]
                            }
                        }]
                    }
                });
            }
        
    });
}
function getgraph_rendez_vous_week()
{
    $.ajax({
            type:'POST',
            data:{
                'getgraph_rendez_vous_week' : 'getgraph_rendez_vous_week'
            },
            success:function(data)
            {
                    console.log(data);
                    // Radialize the colors
                    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                        return {
                            radialGradient: {
                                cx: 0.5,
                                cy: 0.3,
                                r: 0.7
                            },
                            stops: [
                                [0, color],
                                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                            ]
                        };
                    });
                    
                    // Build the chart
                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Les Rendez-Vous de la Semaine Par Type'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    },
                                    connectorColor: 'silver'
                                }
                            }
                        },
                        series: [{
                            name: 'Pourcentage',
                            data: data
                        }]
                    });
            }
        
    });
}
function add_new_action(nbr)
{
    nbr++;
    var actions=$("#action_1").html();
    $("#add_new_action").append(' <div class="form-group"><label for="action">Actions : </label><select onchange="testercmp();" id="action_'+nbr+'" name="action_'+nbr+'" class="form-control select2" data-placeholder="Les agents ..." style="width: 100%;">'+actions+'</select></div>');
    $("#add_new_action").append('<div class="row"><div class="col-md-3"><div class="form-group"><label for="date_debut">Date Début : </label><input class="form-control" placeholder="Date Début" name="date_debut_'+nbr+'" id="date_debut_'+nbr+'" data-inputmask="\'alias\': \'yyyy-mm-dd\'" data-mask="" ></div> </div><div class="col-md-3"><div class="form-group"><label for="date_fin">Date Fin :</label><input class="form-control" placeholder="Date Fin" name="date_fin_'+nbr+'" id="date_fin_'+nbr+'" data-inputmask="\'alias\': \'yyyy-mm-dd\'" data-mask="" ></div></div><div class="col-md-3"><div class="form-group"><label for="Cibles">Cibles :</label><input type="text" class="form-control" placeholder="Cibles" name="Cibles_'+nbr+'" id="Cibles_'+nbr+'" ></div></div><div class="col-md-3"><div class="form-group"><label for="nbr_cible_prevu">Nombre de Cible Prevu :</label><input type="numbre" class="form-control" placeholder="Nombre de Cible Prevu" name="nbr_cible_prevu_'+nbr+'" id="nbr_cible_prevu_'+nbr+'" ></div></div></div><div class="row"><div class="col-md-12"><div class="form-group"><label for="nbr_cible_prevu">objectif de l\'action :</label><textarea name="objectif_action_'+nbr+'" id="objectif_action_'+nbr+'" rows="3" style="width:100%"></textarea></div></div></div>');
    $("#btn_add_new_action").attr('onclick', 'add_new_action('+nbr+')');
    $("#btn-save").attr('onclick', 'save_action_week('+nbr+')');
}
function filtrer_reaffectation()
{
        nature_contact_hors=$("#nature_contact_hors").val();
        Ville_hors=$("#Ville_hors").val();
        Lycee_hors=$("#Lycee_hors").val();
        Ville_Lycee_hors=$("#Ville_Lycee_hors").val();
        $('#btn-filt').attr("disabled","disabled");
        $.ajax({
            type:'POST',
            data:{
                'nature_contact_hors' :nature_contact_hors,
                'Ville_hors' :Ville_hors,
                'Lycee_hors' :Lycee_hors,
                'Ville_Lycee_hors' :Ville_Lycee_hors
            },
            success:function(data)
            {
                $('#insert_place').html(data);
                $('#btn-filt').removeAttr("disabled");
            }
        });
}
function getgraph_actions_by_user_week()
{
    $.ajax({
            type:'POST',
            data:{
                'actions_by_user_week' : 'actions_by_user_week'
            },
            success:function(data)
            {
            		var dtn = [];
        			for(var i=0;i<data.data_detail.length;i++)
        			{
        			    dtn.push({name: data.data_detail[i].nom, y: parseFloat((parseInt(data.data_detail[i].nbr_cible_realise)/parseInt(data.data_detail[i].nbr_total_cible))*100), drilldown:data.data_detail[i].nom});
        			}
        			var ser = [];
        			var dt=[];
        			for(var i=0;i<data.series.length;i++)
        			{
        			    for(var j =0;j<data.series[i].data.length;j++)
        			    {
        			        cmp=data.series[i].data[j][0];
        			        nbr=parseInt(data.series[i].data[j][1]);
        			        dt.push([cmp,nbr]);
        			    }
        			    ser.push({name: data.series[i].name, id:data.series[i].name,data:dt});
        			}
        			var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth()+1; //January is 0!
                    var yyyy = today.getFullYear();
                    if(dd<10) {
                        dd='0'+dd
                    } 
                    
                    if(mm<10) {
                        mm='0'+mm
                    } 
                    
                    today = mm+'/'+dd+'/'+yyyy;
        			console.log(dt);
        			Highcharts.chart('container3', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Suivi des Actions '+today
                    },
                    subtitle: {
                        text: 'Université privée de Marrakech'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: '-'
                        }
                
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.1f}'
                            }
                        }
                    },
                
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                    },
                
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: dtn
                    }],
                    drilldown: {
                        series: ser
                    }
                });
                            }
        
    });
}
function save_action_week(nbr)
{
    actions=new Array();
    for(i=1;i<=nbr;i++)
    {
        actions.push({date_debut:$("#date_debut_"+i).val(),date_fin:$("#date_fin_"+i).val(),action:$("#action_"+i).val(),Cibles:$("#Cibles_"+i).val(),nbr_cible_prevu:$("#nbr_cible_prevu_"+i).val(),objectif_action:$("#objectif_action_"+i).val()});

         /* actions[i]['date_debut']= $("#date_debut_"+i).val();
          actions[i]['date_fin']= $("#date_fin_"+i).val();
          actions[i]['action']= $("#action_"+i).val();
          actions[i]['Cibles']= $("#Cibles_"+i).val();
          actions[i]['nbr_cible_prevu']= $("#nbr_cible_prevu_"+i).val();*/
    }
    $('#btn-save').attr("disabled","disabled");
            $.ajax({
                type:'POST',
                data:{
                    'commercial' : $("#commercial").val(),
                    'date_debut' : $("#date_debut").val(),
                    'date_fin' : $("#date_fin").val(),
                    'actions' : actions,
                    'Objectif' : CKEDITOR.instances['Objectif'].getData()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert("Opération Effectué Avec Succès");
                        window.location="/?page=actions_week";
                    }
                    else
                    {
                        alert("Erreur Merci de Contacter le Support Technique");
                    }
                }
            });
       
}
function getgraph_taux_transformation_prospect_inscrit()
{
    $.ajax({
            type:'POST',
            data:{
                'reporting_realisation' : 'reporting_realisation'
            },
            success:function(data)
            {
                
               		var users = [];
        			var nbr_taux = [];
        			for(var i in data)
        			{
        				users.push(data[i].user);
        				var tn=parseFloat((parseInt(data[i].nbr_Inscrit)/parseInt(data[i].nbr_contact))*100);
        				tn=tn.toFixed(2);
        				nbr_taux.push(parseFloat(tn));
        			}
        			Highcharts.chart('container2', {
                        chart: {
                            type: 'column',
                            options3d: {
                                enabled: true,
                                alpha: 10,
                                beta: 25,
                                depth: 70
                            }
                        },
                        title: {
                            text: 'Taux de transformation de prospect en inscrit'
                        },
                        subtitle: {
                            text: 'Université privée de Marrakech'
                        },
                        plotOptions: {
                            column: {
                                depth: 25
                            },
                             bar: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        xAxis: {
                            categories: users
                        },
                        yAxis: {
                            title: {
                                text: null
                            }
                        },
                        tooltip: {
                            valueSuffix: ' %'
                        },
                        series: [{
                            name: 'Efficacité',
                            data: nbr_taux
                        }]
                    });
                    var html='<table class="table table-bordered"><tr>';
                    for(var i in users)
        			{
        				html+='<td>'+users[i]+'</td>'
        			}
        			html+='</tr><tr>';
        			for(var i in nbr_taux)
        			{
        				html+='<td>'+nbr_taux[i]+' %</td>'
        			}
        			html+='</tr></table>';
        			$("#html_add").html(html);
            }
        
    });
}

function getgraph_realisation_par_zone()
{
    $.ajax({
            type:'POST',
            data:{
                'realisation_par_zone' : 'reporting_realisation'
            },
            success:function(data)
            {
               		var regions= [];
        			var nbr_totals = [];
        			var nbr_inscrits = [];
        			for(var i in data)
        			{
        			    if(data[i].regions=="0")
        			    {
        			        regions.push("Autres");
        			    }
        				else
        				{
        			        regions.push(data[i].regions);
        			    }
        				nbr_totals.push(parseInt(data[i].nbr_contact));
        				nbr_inscrits.push(parseInt(data[i].nbr_inscrit));
        			}
        			console.log(regions);
        			console.log(nbr_totals);
        			console.log(nbr_inscrits);
        			 Highcharts.chart('container1', {
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: 'Reporting des réalisation par Zone'
                            },
                            subtitle: {
                                text: 'Université privée de Marrakech'
                            },
                            xAxis: {
                                categories: regions,
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Contacts',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                }
                            },
                            tooltip: {
                                valueSuffix: ' Contacts'
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            legend: {
                                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                                shadow: true
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Total',
                                data: nbr_totals
                            }, {
                                name: 'Inscrits',
                                data: nbr_inscrits
                            }]
                            });
            }
        
    });
}
function getgraph_reporting_realisation_par_charge_promotion()
{
    $.ajax({
            type:'POST',
            data:{
                'reporting_realisation' : 'reporting_realisation'
            },
            success:function(data)
            {
               		var users = [];
        			var nbr_depots_dossier = [];
        			var nbr_test_passes = [];
        			var nbr_Inscrits = [];
        			var nbr_contacts = [];
        			var nbr_transfer = [];
        			var nbr_contact_indirect = [];
        			for(var i in data)
        			{
        				users.push(data[i].user);
        				nbr_depots_dossier.push(parseInt(data[i].nbr_depot_dossier));
        				nbr_test_passes.push(parseInt(data[i].nbr_test_passe));
        				nbr_Inscrits.push(parseInt(data[i].nbr_Inscrit));
        				nbr_contacts.push(parseInt(data[i].nbr_contact));
        				nbr_transfer.push(parseInt(data[i].nbr_transfer));
        				nbr_contact_indirect.push(parseInt(data[i].nbr_contact_indirect));
        			}
        			console.log(users);
        			console.log(nbr_depots_dossier);
        			console.log(nbr_test_passes);
        			console.log(nbr_Inscrits);
        			console.log(nbr_contacts);
        			 Highcharts.chart('container', {
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: 'Reporting des réalisation par chargé de promotion'
                            },
                            subtitle: {
                                text: 'Université privée de Marrakech'
                            },
                            xAxis: {
                                categories: users,
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Contacts',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                }
                            },
                            tooltip: {
                                valueSuffix: ' Contacts'
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            legend: {
                                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                                shadow: true
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'NBR. Contact Indirect',
                                data: nbr_contact_indirect
                            },{
                                name: 'NBR. CDI Transférés',
                                data: nbr_transfer
                            },{
                                name: 'NBR. Contact Direct',
                                data: nbr_contacts
                            }, {
                                name: 'Dépôt Dossier',
                                data: nbr_depots_dossier
                            }, {
                                name: 'Concours',
                                data: nbr_test_passes
                            }
                            , {
                                name: 'Inscrits',
                                data: nbr_Inscrits
                            }]
                            });
            }
        
    });
}
 function getgraphhistorique(auths,heure_debut,heure_fin,date)
{
    if(auths!="" && heure_debut!="" && heure_fin!="")
    {
         $.ajax({
            type:'POST',
            data:{
                'auths' : auths,
                'heure_debut' : heure_debut,
                'heure_fin' : heure_fin,
                'date' : date
            },
            success:function(data)
            {
               		var chrt = document.getElementById(auths).getContext("2d");
               		var users = [];
        			var nbr_appels_now_aboutis = [];
        			var nbr_appels_now_non_aboutis = [];
        			for(var i in data)
        			{
        				users.push(data[i].nom);
        				nbr_appels_now_aboutis.push(parseInt(data[i].Aboutis));
        				nbr_appels_now_non_aboutis.push(parseInt(data[i].Non_Aboutis));
        			}
        			var areaChartData = {
                  labels: users,
                  datasets: [
                    {
                      label: "Aboutis",
                      fillColor: "#00a65a",
                      strokeColor: "#00a65a",
                      pointColor: "#00a65a",
                      pointStrokeColor: "#c1c7d1",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "#00a65a",
                      data: nbr_appels_now_aboutis
                    },
                    {
                      label: "Non Aboutis",
                      fillColor: "rgba(60,141,188,0.9)",
                      strokeColor: "rgba(60,141,188,0.8)",
                      pointColor: "#3b8bba",
                      pointStrokeColor: "rgba(60,141,188,1)",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "rgba(60,141,188,1)",
                      data: nbr_appels_now_non_aboutis
                    }
                  ]
                };
                 var barChartCanvas = $("#"+auths).get(0).getContext("2d");
                var barChart = new Chart(barChartCanvas);
                var barChartData = areaChartData;
                barChartData.datasets[1].fillColor = "#f56954";
                barChartData.datasets[1].strokeColor = "#f56954";
                barChartData.datasets[1].pointColor = "#f56954";
                var barChartOptions = {
                  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                  scaleBeginAtZero: true,
                  //Boolean - Whether grid lines are shown across the chart
                  scaleShowGridLines: true,
                  //String - Colour of the grid lines
                  scaleGridLineColor: "rgba(0,0,0,.05)",
                  //Number - Width of the grid lines
                  scaleGridLineWidth: 1,
                  //Boolean - Whether to show horizontal lines (except X axis)
                  scaleShowHorizontalLines: true,
                  //Boolean - Whether to show vertical lines (except Y axis)
                  scaleShowVerticalLines: true,
                  //Boolean - If there is a stroke on each bar
                  barShowStroke: true,
                  //Number - Pixel width of the bar stroke
                  barStrokeWidth: 2,
                  //Number - Spacing between each of the X value sets
                  barValueSpacing: 5,
                  //Number - Spacing between data sets within X values
                  barDatasetSpacing: 1,
                  //String - A legend template
                  legendTemplate: "" +
                  "<ul class=\"<%=name.toLowerCase()%>-legend\">" +
                    "<% for (var i=0; i<datasets.length; i++){%>" +
                      "<li>" +
                        "<span style=\"background-color:<%=datasets[i].fillColor%>\"></span>" +
                        "<%if(datasets[i].label){%><%=datasets[i].label%><%}%>" +
                      "</li>" +
                    "<%}%>" +
                  "</ul>",
                  //Boolean - whether to make the chart responsive
                  responsive: true,
                  maintainAspectRatio: true
                };
        
                barChartOptions.datasetFill = false;
                barChart.Bar(barChartData, barChartOptions);
            }
        });
    }
}
function reaffectation_etb(ligne)
{
    if($("#agent"+ligne).val()!="")
    {
        Lycee=$("#Lycee"+ligne).val();
        Ville=$("#Ville"+ligne).val();
        Ville_Lycee=$("#Ville_Lycee"+ligne).val();
        Nature_de_Contact=$("#Nature_de_Contact"+ligne).val();
        agent=$("#agent"+ligne).val();
        suivi_par=$("#Contact_Suivi_par"+ligne).val();
        $('#btn'+ligne).attr("disabled","disabled");
        $.ajax({
            type:'POST',
            data:{
                'Lycee' :Lycee,
                'Ville' :Ville,
                'Ville_Lycee' :Ville_Lycee,
                'Nature_de_Contact' :Nature_de_Contact,
                'Contact_Suivi_par' :suivi_par,
                'agent' :agent
            },
            success:function(data)
            {
                if(data.validation)
                {
                    alert("Opération Effectué Avec Succès");
                    $('#tr'+ligne).hide(200);
                }
            }
        });
    }
    else
    {
        alert(ligne);
    }
}
function affectation_etb(ligne)
{
    if($("#agent"+ligne).val()!="")
    {
        Lycee=$("#Lycee"+ligne).val();
        Ville=$("#Ville"+ligne).val();
        Ville_Lycee=$("#Ville_Lycee"+ligne).val();
        Nature_de_Contact=$("#Nature_de_Contact"+ligne).val();
        agent=$("#agent"+ligne).val();
        $('#btn'+ligne).attr("disabled","disabled");
        $.ajax({
            type:'POST',
            data:{
                'Lycee' :Lycee,
                'Ville' :Ville,
                'Ville_Lycee' :Ville_Lycee,
                'Nature_de_Contact' :Nature_de_Contact,
                'agent' :agent
            },
            success:function(data)
            {
                if(data.validation)
                {
                    alert("Opération Effectué Avec Succès");
                    $('#tr'+ligne).hide(200);
                }
            }
        });
    }
    else
    {
        alert(ligne);
    }
}
 function validation_demande(nom_cmp)
{
    
    if(nom_cmp!="")
    {
        agents = nom_cmp.replace(" ", "");
        agents = agents.replace(/\s/g, "");
        $('#btn_'+agents).attr("disabled","disabled");
        $('#btn_'+agents).html("Loading ...");
        $('#btn_'+agents).hide();
        tagents=agents;
        agents=$("#agents_"+agents).val();
        
        $.ajax({
            type:'POST',
            data:{
                'nom_cmp' :nom_cmp ,
                'nom_cmp_agents' :agents
            },
            success:function(data)
            {
                if(data.validation)
                {
                    alert("Opération Effectué Avec Succès");
                    $('#tr_'+tagents).hide(500);
                }
            }
        });
    }
}
 
 function nbr_appels_now()
{
   
        $.ajax({
            type:'POST',
            data:{
                'nbr_appels_now' : 'nbr_appels_now'
            },
            success:function(data)
            {
               		var chrt = document.getElementById("barChart").getContext("2d");
               		var users = [];
        			var nbr_appels_now_aboutis = [];
        			var nbr_appels_now_non_aboutis = [];
        			for(var i in data)
        			{
        				users.push(data[i].nom);
        				nbr_appels_now_aboutis.push(parseInt(data[i].Aboutis));
        				nbr_appels_now_non_aboutis.push(parseInt(data[i].Non_Aboutis));
        			}
        			var areaChartData = {
                  labels: users,
                  datasets: [
                    {
                      label: "Aboutis",
                      fillColor: "#00a65a",
                      strokeColor: "#00a65a",
                      pointColor: "#00a65a",
                      pointStrokeColor: "#c1c7d1",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "#00a65a",
                      data: nbr_appels_now_aboutis
                    },
                    {
                      label: "Non Aboutis",
                      fillColor: "rgba(60,141,188,0.9)",
                      strokeColor: "rgba(60,141,188,0.8)",
                      pointColor: "#3b8bba",
                      pointStrokeColor: "rgba(60,141,188,1)",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "rgba(60,141,188,1)",
                      data: nbr_appels_now_non_aboutis
                    }
                  ]
                };
                 var barChartCanvas = $("#barChart").get(0).getContext("2d");
                var barChart = new Chart(barChartCanvas);
                var barChartData = areaChartData;
                barChartData.datasets[1].fillColor = "#f56954";
                barChartData.datasets[1].strokeColor = "#f56954";
                barChartData.datasets[1].pointColor = "#f56954";
                var barChartOptions = {
                  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                  scaleBeginAtZero: true,
                  //Boolean - Whether grid lines are shown across the chart
                  scaleShowGridLines: true,
                  //String - Colour of the grid lines
                  scaleGridLineColor: "rgba(0,0,0,.05)",
                  //Number - Width of the grid lines
                  scaleGridLineWidth: 1,
                  //Boolean - Whether to show horizontal lines (except X axis)
                  scaleShowHorizontalLines: true,
                  //Boolean - Whether to show vertical lines (except Y axis)
                  scaleShowVerticalLines: true,
                  //Boolean - If there is a stroke on each bar
                  barShowStroke: true,
                  //Number - Pixel width of the bar stroke
                  barStrokeWidth: 2,
                  //Number - Spacing between each of the X value sets
                  barValueSpacing: 5,
                  //Number - Spacing between data sets within X values
                  barDatasetSpacing: 1,
                  //String - A legend template
                  legendTemplate: "" +
                  "<ul class=\"<%=name.toLowerCase()%>-legend\">" +
                    "<% for (var i=0; i<datasets.length; i++){%>" +
                      "<li>" +
                        "<span style=\"background-color:<%=datasets[i].fillColor%>\"></span>" +
                        "<%if(datasets[i].label){%><%=datasets[i].label%><%}%>" +
                      "</li>" +
                    "<%}%>" +
                  "</ul>",
                  //Boolean - whether to make the chart responsive
                  responsive: true,
                  maintainAspectRatio: true
                };
        
                barChartOptions.datasetFill = false;
                barChart.Bar(barChartData, barChartOptions);
            }
        });
    
}
function createcampagnForemailing(nbr)
{
    ObservationEmail=$("#ObservationEmail").val();
    mytest=false;
    myarray= [];
    j=0;
    for(i=1;i<=nbr;i++)
    {
        if ($('#LCT'+i).is(":checked"))
        {
            mytest=true;
            myarray[j]=$('#hidden'+i).val();
            j++;
        }
    }
    if(mytest)
    {
        $('#listofthis').html('<div class="text-center"><img src="dist/img/loading.gif" width="10%"></div>');
        console.log(myarray);
        var email_cmp = CKEDITOR.instances['email_cmp'].getData();
        var dt = new Date();
        var date = dt.getDate()+'_'+ (parseInt(dt.getMonth())+1)+'_'+ dt.getFullYear()+'_'+ dt.getHours() + "_" + dt.getMinutes() + "_" + dt.getSeconds();
        if(email_cmp!="")
        {
            cmp_name=$("#nomcompagne").val();
            cmp_name=cmp_name.replace("'", "_");
            $.ajax({
                type:'POST',
                data:{
                    'myarray' : myarray,
                    'email_cmp' : email_cmp,
                    'nbrtotale':j,
                    'ObservationEmail_cmp' : ObservationEmail,
                    'nomcompagne_myarray' : $("#nomcompagne").val()+"_"+date,
                    'typecontact_myarray' : $("#typecontact").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        $('#listofthis').html(data.message);
                        window.setTimeout(function(){

                            // Move to a new location or you can do something else
                            window.location.href = data.url+"?page=listcompagneclp";

                        }, 1000);
                    }
                }
            });
        }
        else
        {
            alert("Email de campagne est obligatoire")
        }

    }
}
function FiltrerCompgneeamiling()
{
    $("#filtrer").hide();
    $("#btnfilter").show();
    if($("#anneeuniver").val() != "" && $("#typecontact").val() != "" && $("#nomcompagne").val() != "")
    {
        etatphoning=$("#etatphoning").val();
        $.ajax({
            type:'POST',
            data:{
                'anneeuniver' : $("#anneeuniver").val(),
                'typecontactlist' : $("#typecontact").val(),
                'formation' : $("#formation").val(),
                'marche' : $("#marche").val(),
                'ville' : $("#ville").val(),
                'serie_bac' : $("#serie_bac").val(),
                'niveau_etd' : $("#niveau_etd").val(),
                'statut' : $("#statut").val(),
                'resultat' : $("#resultat").val(),
                'test' : $("#test").val(),
                'absent' : $("#absent").val(),
                'centre' : $("#centre").val(),
                'test_passe' : $("#test_passe").val()
            },
            success:function(data)
            {
                if(data.validation)
                {
                    $("#filtrer").show();
                    $("#biglistcontact").show();
                    $("#listcontact").show();
                    $("#btnfilter").hide();
                    $("#listofthis").html(data.result);
                    $("#btn_create").attr('onclick','createcampagnForemailing('+data.nbrline+');');
                    var datatableinst = $('#example1').DataTable({

                        "paging": false,
                        "lengthChange": false,
                        "searching": true,
                        "searchable": true,
                        "ordering": false,
                        "info": true,
                        "autoWidth": false,
                        "bPaginate": false,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": true,
                        'bSortable': false,
                        "bAutoWidth": false
                    });
                    $('#example1 thead th').each(function(){
                        var title = $('#example1 tfoot th').eq($(this).index()).text();
                        if(title!="")
                        {
                            $(this).html('<input style="width:100%;" type="text" placeholder="'+title+'"/>');
                        }
                    });
                    datatableinst.columns().every(function(){
                        var datatabbleColumn=this;
                        $(this.header()).find("input[type=text]").on('keyup change',function(){
                            datatabbleColumn.search(this.value).draw();
                        });
                    });
                }
            }
        });
    }
    else{
        $("#filtrer").show();
        $("#btnfilter").hide();
        alert("S'il vous plaît remplir les champs obligatoire !");
    }
}




function showscripts(auth)
{
    script=$('#id_'+auth).val();
    $("#scripte_content").html(script);
    $('#scriptes').modal('show');
}
function testercmp()
{
    if($('#action').val()=="Campagne")
    {
        $('#campagne').show();
        $("#nom_action").hide();
    }
    else
    {
        $('#campagne').hide();
        $("#nom_action").show();
    }
}
function save_action()
{
    $('#btn-save').attr("disabled","disabled");
    if($("#action").val()!="" )
    {
        if($('#action').val()=="Campagne" && $("#campagne").val()!="")
        {
            $.ajax({
                type:'POST',
                data:{
                    'action' : $("#action").val(),
                    'nom_action' : $("#campagne").val(),
                    'type_contact' : $("#type_contact").val(),
                    'objectif' : $("#objectif").val(),
                    'suit_donner' : $("#suit_donner").val(),
                    'date_action' : $("#date_action").val(),
                    'heure_action' : $("#heure_action").val(),
                    'cible' : $("#cible").val(),
                    'cible_prevu' : $("#cible_prevu").val(),
                    'cible_realise' : $("#cible_realise").val(),
                    'message' : $("#message").val(),
                    'observation' : $("#observation").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert("Opération Effectué Avec Succès");
                    }
                    else
                    {
                        alert("Erreur Merci de Contacter le Support Technique");
                    }
                }
            });
        }
        else
        {
            $("#campagne").focus();
            $('#campagne').css("border-color","#F44336");
            setTimeout(function(){ $('#campagne').css("border-color","#d2d6de");  }, 700);
            $('#btn-save').removeAttr("disabled");
        }
        if($("#action").val()!="" &&$("#nom_action").val()!="")
        {
            $.ajax({
                type:'POST',
                data:{
                    'action' : $("#action").val(),
                    'nom_action' : $("#nom_action").val(),
                    'type_contact' : $("#type_contact").val(),
                    'objectif' : $("#objectif").val(),
                    'suit_donner' : $("#suit_donner").val(),
                    'date_action' : $("#date_action").val(),
                    'heure_action' : $("#heure_action").val(),
                    'cible' : $("#cible").val(),
                    'cible_prevu' : $("#cible_prevu").val(),
                    'cible_realise' : $("#cible_realise").val(),
                    'message' : $("#message").val(),
                    'observation' : $("#observation").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert("Opération Effectué Avec Succès");
                            $("#action").val(""),
                            $("#nom_action").val(""),
                            $("#type_contact").val(""),
                            $("#objectif").val(""),
                            $("#suit_donner").val(""),
                            $("#date_action").val(""),
                            $("#heure_action").val(""),
                            $("#cible").val(""),
                            $("#cible_prevu").val(""),
                            $("#cible_realise").val(""),
                            $("#message").val(""),
                            $("#observation").val("")
                    }
                    else
                    {
                        alert("Erreur Merci de Contacter le Support Technique");
                    }
                }
            });
        }
        else
        {
            $("#nom_action").focus();
            $('#nom_action').css("border-color","#F44336");
            setTimeout(function(){ $('#nom_action').css("border-color","#d2d6de");  }, 700);
            $('#btn-save').removeAttr("disabled");
        }
    }
    else
    {
        if($("#action").val()=="")
        {
            $("#action").focus();
            $('#action').css("border-color","#F44336");
            setTimeout(function(){ $('#action').css("border-color","#d2d6de");  }, 700);
        }
        $('#btn-save').removeAttr("disabled");
    }
}
function valider_selection_rappel(auth,type,id_contact)
{
    $("#btn_"+auth).hide(200);

    if(auth!="" && type!="")
    {
        $.ajax({
            type:'POST',
            data:{
                'auth' : auth ,
                'type' : type,
                'id_contact' : id_contact,
                'Etape_phoning' : $("#select_"+auth).val()
            },
            success:function(data)
            {
                if(data.validation)
                {
                    $("#tr_"+auth).hide(200);
                }
                else
                {
                    alert("Erreur Merci de Contacter le Support Technique");
                }
            }
        });
    }
    else
    {
        $("#btn_"+auth).show(200);
    }

}
function addupdatecontact(auth,type)
{
    $('#btn_delete').attr("disabled","disabled");
    $('#btn_add').attr("disabled","disabled");
    $('#btn_adda').attr("disabled","disabled");
    $('#btn_deletea').attr("disabled","disabled");
    if(auth!="")
    {
        if(type=="a")
        {
            Nom=$("#noma").val();
            Prenom=$("#prenoma").val();
            Tel=$("#tela").val();
            email=$("#emaila").val();
            Date = $("#datea").val();
            Groupe_Formation = $("#groupe_foramationa").val();
            Formation_Demmandee = $("#formationdemandeea").val();
            Nature_de_Contact = $("#naturecontacta").val();
            Ville = $("#villea").val();
            Lycee = $("#lyceea").val();
            Profession_Mere = $("#professeionmerea").val();
            Profession_Pere = $("#professeionperea").val();
            Mail_Mere = $("#mailmerea").val();
            Mail_Pere = $("#mailperea").val();
            Tel_Mere = $("#telmerea").val();
            Tel_Pere = $("#telperea").val();
            Date_de_Naissance = $("#datenaissancea").val();
            Lieu_de_Naissance = $("#lieunaissancea").val();
            Adresse = $("#adressea").val();
        }
        else
        {
            Nom=$("#nom").val();
            Prenom=$("#prenom").val();
            Tel=$("#tel").val();
            email=$("#email").val();
            Date = $("#date").val();
            Groupe_Formation = $("#groupe_foramation").val();
            Formation_Demmandee = $("#formationdemandee").val();
            Nature_de_Contact = $("#naturecontact").val();
            Ville = $("#ville").val();
            Lycee = $("#lycee").val();
            Profession_Mere = $("#professeionmere").val();
            Profession_Pere = $("#professeionpere").val();
            Mail_Mere = $("#mailmere").val();
            Mail_Pere = $("#mailpere").val();
            Tel_Mere = $("#telmere").val();
            Tel_Pere = $("#telpere").val();
            Date_de_Naissance = $("#datenaissance").val();
            Lieu_de_Naissance = $("#lieunaissance").val();
            Adresse = $("#adresse").val();
        }
        $.ajax({
            type:'POST',
            data:{
                'auth_' : auth,
                'Nom' : Nom,
                'Prenom' : Prenom,
                'Tel' : Tel,
                'email' : email,
                'Date' : Date,
                'Groupe_Formation' : Groupe_Formation,
                'Formation_Demmandee' : Formation_Demmandee,
                'Nature_de_Contact' : Nature_de_Contact,
                'Ville' : Ville,
                'Lycee' : Lycee,
                'Profession_Mere' : Profession_Mere,
                'Profession_Pere' : Profession_Pere,
                'Mail_Mere' : Mail_Mere,
                'Mail_Pere' : Mail_Pere,
                'Tel_Mere' : Tel_Mere,
                'Tel_Pere' : Tel_Pere,
                'Date_de_Naissance' : Date_de_Naissance,
                'Lieu_de_Naissance' : Lieu_de_Naissance,
                'Adresse' : Adresse
            },
            success:function(data)
            {
                if(data.validation)
                {
                    $("#tr_"+auth).hide(300);
                    alert("Opération Effectué Avec Succès");
                    $('#btn_delete').removeAttr("disabled");
                    $('#btn_add').removeAttr("disabled");
                    $('#btn_adda').removeAttr("disabled");
                    $('#btn_deletea').removeAttr("disabled");
                }
            }
        });
    }
}
function deletecontact(auth,type)
{
    $('#btn_delete').attr("disabled","disabled");
    $('#btn_add').attr("disabled","disabled");
    $('#btn_adda').attr("disabled","disabled");
    $('#btn_deletea').attr("disabled","disabled");
    $.ajax({
        type:'POST',
        data:{
            'auth_delete_' : auth
        },
        success:function(data)
        {
            if(data.validation)
            {
                $("#tr_"+auth).hide(300);
                alert("Opération Effectué Avec Succès");
                $('#btn_delete').removeAttr("disabled");
                $('#btn_add').removeAttr("disabled");
                $('#btn_adda').removeAttr("disabled");
                $('#btn_deletea').removeAttr("disabled");
            }
        }
    });
}
function getfichecontactrappel(id,stat,type)
{
    $("#btn-save").hide();
    if(stat==1)
    {
        if(id!="")
        {
            $.ajax({
                type:'POST',
                data:{
                    'auth' : id ,
                    'type' : type
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        $('#ntel').val("");
                        $('#etapephoning_ans').val("");
                        $('#observation_ans').val("");
                        $('#nemail').val("");
                        $('#observation').val("");
                        $("#s1tc").val("");
                        $("#s2tc").val("");
                        $("#annuelletc").val("");
                        $('#Status_rdv').val("");
                        document.getElementById('rdv_non').checked=false;
                        document.getElementById('rdv_oui').checked=false;
                        $("#s1bac1").val("");
                        $("#s2bac1").val("");
                        $("#annuellebac1").val("");
                        $("#noteregional").val("");
                        $("#s1bac2").val("");
                        $("#s2bac2").val("");
                        $("#annuellebac2").val("");
                        $("#notenational").val("");
                        $("#notegenerale").val("");
                        $('#ntel').val(data.data.Ntel);
                        $('#nemail').val(data.data.Nemail);
                        $('#nom').val(data.data.Nom);
                        $('#prenom').val(data.data.Prenom);
                        $('#nature_contact').val(data.data.Nature_de_Contact);
                        $('#ville').val(data.data.Ville);
                        $('#ville_lycee').val(data.data.Ville_Lycee);
                        $('#formation_containaire').html(data.data.Formation_Demmandee);
                        $('#niveau_etudes').val(data.data.Niveau_des_etudes);
                        $('#gsm').val(data.data.GSM);
                        $('#telephone').val(data.data.Tel);
                        $('#tel_pere').val(data.data.Tel_Pere);
                        $('#tel_mere').val(data.data.Tel_Mere);
                        $('#etatpephonig').html(data.data.etphoning);
                        $('#adresse').val(data.data.Adresse);
                        for(k=0;k<data.data.Observations.length;k++)
                        {
                            $('#observation_ans').val("+ "+data.data.Observations[k]+"\n"+$('#observation_ans').val());
                        }
                        if(data.data.Etape_Phoning!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning actuale : "+data.data.Etape_Phoning);}
                        if((data.data.Etape_Phoning1)!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning1 : "+data.data.Etape_Phoning1);}
                        if(data.data.Etape_Phoning2!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning2 : "+data.data.Etape_Phoning2);}
                        if(data.data.Etape_Phoning3!=null){ $('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning3 : "+data.data.Etape_Phoning3);}
                        if(data.data.Etape_Phoning4!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning4 : "+data.data.Etape_Phoning4);}
                        if(data.data.Etape_Phoning5!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning5 : "+data.data.Etape_Phoning5);}
                        if(data.data.Etape_Phoning6!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning6 : "+data.data.Etape_Phoning6);}
                        if(data.data.Etape_Phoning7!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning7 : "+data.data.Etape_Phoning7);}
                        if(data.data.Etape_Phoning8!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning8 : "+data.data.Etape_Phoning8);}
                        if(data.data.Etape_Phoning9!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning9 : "+data.data.Etape_Phoning9);}
                        if(data.data.Etape_Phoning10!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning10 : "+data.data.Etape_Phoning10);}
                       $("#s1tc").val(data.data.s1tc);
                        $("#date_frais").val(data.data.Date_Frais); 
                        $("#s2tc").val(data.data.s2tc);
                        $("#annuelletc").val(data.data.annuelletc);
                        $("#s1bac1").val(data.data.s1bac1);
                        $("#s2bac1").val(data.data.s2bac1);
                        $("#annuellebac1").val(data.data.annuellebac1);
                        $("#noteregional").val(data.data.noteregional);
                        $("#s1bac2").val(data.data.s1bac2);
                        $("#s2bac2").val(data.data.s2bac2);
                        $("#annuellebac2").val(data.data.annuellebac2);
                        $("#notenational").val(data.data.notenational);
                        $("#notegenerale").val(data.data.notegenerale);
                        $("#contact_suivi_par").val(data.data.contact_suivi_par);
                        $('#send_email').show();
                        $('#btn-save').attr("onclick","getfichecontactrappel('"+data.data.id+"',0,'"+type+"')");
                        //$('#telesip').attr("href","sip:"+data.data.Tel);
                        //$('#telpereesip').attr("href","sip:"+data.data.Tel_Pere);
                        //$('#telemeresip').attr("href","sip:"+data.data.Tel_Mere);
                        //$('#telesip').css("background_color","#50de9c");
                        $('#telesip .fa').css("color","white");
                        $("#btnrdv").attr("onclick","createrdv('"+data.data.id+"','"+campagne+"')");
                        if(data.data.GSM != "")
                        {
                            window.location.replace("sip:"+data.data.GSM);
                        }

                    }
                    else{
                        alert("Opération Effectué Avec Succès");
                        window.location.replace("/?page=recherche");
                    }
                }
            });
        }
        else
        {
            window.location.replace("/");
        }
    }
    else if(stat==0)
    {
        s1tc=$("#s1tc").val();
        s2tc=$("#s2tc").val();
        annuelletc=$("#annuelletc").val();
        s1bac1=$("#s1bac1").val();
        s2bac1=$("#s2bac1").val();
        annuellebac1=$("#annuellebac1").val();
        noteregional=$("#noteregional").val();
        formation_demandee=$("#formation_demandee").val();
        s1bac2=$("#s1bac2").val();
        s2bac2=$("#s2bac2").val();
        annuellebac2=$("#annuellebac2").val();
        notenational=$("#notenational").val();
        notegenerale=$("#notegenerale").val();
        test_notes=true;
        status_rdv="";
        etatpephonig="";
        etat_rdv="";
        if(document.getElementById('rdv_non').checked==true)
        {
            if($('#Status_rdv').val()=="")
            {
                alert("Merci de selectioné le status de RDV");return false;
            }
            else
            {
                etatpephonig="Qualifié en cours";
                status_rdv=$('#Status_rdv').val();
                etat_rdv=0;
            }
            
        }
        else if(document.getElementById('rdv_oui').checked==true)
        {
            if($('#Status_rdv').val()=="")
            {
                etatpephonig="Qualifié";
                status_rdv="Qualifié";
                etat_rdv=1;
            }
            else
            {
                etatpephonig="Qualifié";
                status_rdv=$('#Status_rdv').val();
                etat_rdv=1;
            }
        }
        else if(etatpephonig=="" && etat_rdv=="" && status_rdv=="")
        {
            etatpephonig="NA";
        }
        if(!test_notes)
        {
            $("#btn-save").show();
            alert("Merci de verifier les notes ...");
        }
        else
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : "",
                    'type' : type,
                    'status_rdv' : status_rdv,
                    'etat_rdv' : etat_rdv,
                    'etapephoning' : etatpephonig,
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val(),
                    's1tc': $("#s1tc").val(),
                    's2tc': $("#s2tc").val(),
                    'annuelletc':$("#annuelletc").val(),
                    'formation_demandee':formation_demandee,
                    's1bac1':$("#s1bac1").val(),
                    's2bac1':$("#s2bac1").val(),
                    'annuellebac1':$("#annuellebac1").val(),
                    'noteregional':$("#noteregional").val(),
                    's1bac2':$("#s1bac2").val(),
                    's2bac2':$("#s2bac2").val(),
                    'annuellebac2':$("#annuellebac2").val(),
                    'notenational':$("#notenational").val(),
                    'notegenerale':$("#notegenerale").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        getfichecontact(data.message,1,0);
                    }
                }
            });
        }
    }
    else if(stat==5)
    {
        if($('#etatpephonig').val()=="")
        {
            alert("Merci de Selectionner Etape Phoning");
        }
        else
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : campagne,
                    'etapephoning' : $('#etatpephonig').val(),
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert(" Opération effectuée avec succès … ");
                    }
                }
            });
        }
    }
    $("#btn-save").show();

}

function affecterdeletecmp(auth,type)
{
    $('#btn_delete').attr('onclick','deletecampagne("'+auth+'","'+type+'")');
}
function hidemodeledeletecmp()
{
    $('#deletecampagne').modal('hide');
}
function deletecampagne(auth,type)
{
    if(auth!="")
    {
        $('#btn_delete').attr("disabled","disabled");
        $.ajax({
            type:'POST',
            data:{
                'auth' : auth,
                'type' : type
            },
            success:function(data)
            {
                if(data.validation)
                {
                    alert('La Campagne '+auth+' est Supperimer');
                    $("#"+auth).hide();
                    $("#btn_delete").removeAttr("disabled");
                }
            }
        });
    }
}
$("#formationdemandee").change(function(){
    $.ajax({
            method:"POST",
            data:"formationdemandee="+$("#formationdemandee").val(),
            success:function(data)
            {
        $("#select2-niveaudemande-container").html('');
                $("#niveaudemande").html(data);

            }
        }
    )
});


    

$("#professpere,#professmere").change(function()
{

           
            if($(this).val().trim()=="Autres")
            {
                var elm = document.createElement('input');
                elm.id=$(this).attr("id");
                elm.size="50";
                $(this).closest("div").find("select").attr("id","###");
                $(this).closest("div").find("select").hide();
                $(this).closest("div").find("span").hide();
                $(this).closest("div").append(elm);
                $(this).closest("div").find("input").addClass("form-control");
            }
        
        });
function affectervalidation(auth)
{
    $("#tr_"+auth).css( "opacity", 0.5 );
    if(auth!="")
    {
        $.ajax({
            type:'POST',
            data:{
                'auth_validation' : auth
            },
            success:function(data)
            {
                if(data.validation)
                {
                    $("#tr_"+auth).hide(300);
                }
            }
        });
    }
    return false;
}
 function getgraphsaisie()
{
        $.ajax({
            type:'POST',
            data:{
                'saisie_aujourd' : 'saisie_global'
            },
            success:function(data)
            {
               		var chrt = document.getElementById("nbrsaisieauj").getContext("2d");
               		var users = [];
			var nbr_saisies = [];
			for(var i in data)
			{
				users.push(data[i].nom);
				nbr_saisies.push(parseInt(data[i].nbr_saisie));
			}
			var data = {
    labels: users, //x-axis
    datasets: [
        {
           label: "Nombre de saisie",
              fillColor: "#00a65a",
              strokeColor: "#00a65a",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,258,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,258,1)",
            data: nbr_saisies // y-axis
        }
    ]
};
var myFirstChart = new Chart(chrt).Bar(data, {
    showTooltips: false,
    onAnimationComplete: function () {

        var ctx = this.chart.ctx;
        ctx.font = this.scale.font;
        ctx.fillStyle = this.scale.textColor
        ctx.textAlign = "center";
        ctx.textBaseline = "bottom";

        this.datasets.forEach(function (dataset) {
            dataset.bars.forEach(function (bar) {
                ctx.fillText(bar.value, bar.x, bar.y - 5);
            });
        })
    },
    options: {
         responsive: true,
            maintainAspectRatio: false
    }
});	
            }
        });
    
}
 function getgraphsaisie_globale()
{
   
        $.ajax({
            type:'POST',
            data:{
                'saisie_global' : 'saisie_global'
            },
            success:function(data)
            {
               		var chrt = document.getElementById("nbrsaisie").getContext("2d");
               		var users = [];
			var nbr_saisies = [];
			for(var i in data)
			{
				users.push(data[i].nom);
				nbr_saisies.push(parseInt(data[i].nbr_saisie));
			}
			var data = {
    labels: users, //x-axis
    datasets: [
        {
           label: "Nombre de saisie",
              fillColor: "#00a65a",
              strokeColor: "#00a65a",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,258,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,258,1)",
            data: nbr_saisies // y-axis
        }
    ]
};

var myFirstChart = new Chart(chrt).Bar(data, {
    showTooltips: false,
    onAnimationComplete: function () {

        var ctx = this.chart.ctx;
        ctx.font = this.scale.font;
        ctx.fillStyle = this.scale.textColor
        ctx.textAlign = "center";
        ctx.textBaseline = "bottom";

        this.datasets.forEach(function (dataset) {
            dataset.bars.forEach(function (bar) {
                ctx.fillText(bar.value, bar.x, bar.y - 5);
            });
        })
    },
    options: {
         responsive: true,
        maintainAspectRatio: false
    }
});
            }
        });
    
}
 function getgraphday(auths,date,option)
{
    if(auths!="" && date!="" && option!="")
    {
        $.ajax({
            type:'POST',
            data:{
                'auths' : auths,
				'date' : date,
				'option' : option
            },
            success:function(data)
            {
               		var chrt = document.getElementById(auths).getContext("2d");
               		var users = [];
			var appells = [];
			for(var i in data)
			{
				users.push(data[i].TA1);
				appells.push(parseInt(data[i].appels));
			}
			var data = {
    labels: users, //x-axis
    datasets: [
        {
           label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
            data: appells // y-axis
        }
    ]
};

var myFirstChart = new Chart(chrt).Bar(data, {
    showTooltips: false,
    onAnimationComplete: function () {

        var ctx = this.chart.ctx;
        ctx.font = this.scale.font;
        ctx.fillStyle = this.scale.textColor
        ctx.textAlign = "center";
        ctx.textBaseline = "bottom";

        this.datasets.forEach(function (dataset) {
            dataset.bars.forEach(function (bar) {
                ctx.fillText(bar.value, bar.x, bar.y - 5);
            });
        })
    }
});	
            }
        });
    }
}
     
 window.onload = getgraphday;

$("#valide").change(function(){
        if(document.getElementById('valide').checked)
        {
            $.ajax({
                    method:"POST",
                    data:"allagent=true",
                    success:function(data)
                    {
                        $("#lyceee").html(data);
                    }
                }
            )
        }
    else
        {
            $.ajax({
                    method:"POST",
                    data:"allagent=false",
                    success:function(data)
                    {
                        $("#lyceee").html(data);
                    }
                }
            )
        }

});
$("#lyceee").change(function()
{
    $.ajax({
            method:"POST",
            data:"villelycee="+$(this).val(),
            success:function(data)
            {
                $("#villelyceee").html(data);
            }
        }
    );
})
$("#affecter").click(function(){
        if($("#lyceee").val()!=""  && $("#agent").val()!="" && $("#villelyceee").val()!="")
        {
            $.ajax({
                    url:"content/controller/scriptajout.php",
                    method:"POST",
                    data:"lyceee="+$("#lyceee").val()+"&agentt="+ $("#agent").val()+"&villelycee="+$("#villelyceee").val(),
                    success:function(data)
                    {
                        $('html, body').animate({scrollTop: '0px'}, 300);
                        $('#etatajout').html(data);
                        $('#etatajout').fadeIn(1000);
                        $('#etatajout').fadeOut(1000);
                    }
                }
            );
        }
})

function validationselection(selector,etapephoning,type,cmp)
{
    $("#btn"+selector).attr("disabled","disabled");
    $("#btn"+selector).html('Loading ...');
    if('null' != $('#'+selector).val())
    {
            $.ajax({
                type:'POST',
                data:{
                    'validation_selection' : $('#'+selector).val(),
                    'validation_selection_id' : selector,
                    'validation_selection_type' : type,
                     'validation_selection_cmp' : cmp
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        $("#btn"+selector).html('Valider la sélection');
                        $("#btn"+selector).removeAttr("disabled");

                        $("#btn"+selector).removeClass("btn-primary");
                        $("#btn"+selector).addClass("btn-success");
                    }
                    else
                    {
                        $("#btn"+selector).html('Valider la sélection');
                        $("#btn"+selector).removeAttr("disabled");
                    }
                }
            });
    }
    else
    {
        $("#btn"+selector).html('Valider la sélection');
        $("#btn"+selector).removeAttr("disabled");
    }

}
function affecterdelete(auth,auth1,type)
{
    $("#loading").show();
    $("#nom").val("");
    $("#prenom").val("");
    $("#tel").val("");
    $("#email").val("");
    $("#date").val("");
    $("#groupe_foramation").val("");
    $("#formationdemandee").val("");
    $("#naturecontact").val("");
    $("#ville").val("");
    $("#lycee").val("");
    $("#professeionmere").val("");
    $("#professeionpere").val("");
    $("#mailmere").val("");
    $("#mailpere").val("");
    $("#telmere").val("");
    $("#telpere").val("");
    $("#datenaissance").val("");
    $("#lieunaissance").val("");
    $("#adresse").val("");
    $("#noma").val("");
    $("#prenoma").val("");
    $("#tela").val("");
    $("#emaila").val("");
    $("#datea").val("");
    $("#groupe_foramationa").val("");
    $("#formationdemandeea").val("");
    $("#naturecontacta").val("");
    $("#villea").val("");
    $("#lyceea").val("");
    $("#professeionmerea").val("");
    $("#professeionperea").val("");
    $("#mailmerea").val("");
    $("#mailperea").val("");
    $("#telmerea").val("");
    $("#telperea").val("");
    $("#datenaissancea").val("");
    $("#lieunaissancea").val("");
    $("#adressea").val("");
    $('#btn_delete').attr("disabled","disabled");
    $('#btn_add').attr("disabled","disabled");
    $('#btn_adda').attr("disabled","disabled");
    $('#btn_deletea').attr("disabled","disabled");
    var contact1;
    $.ajax({
        type:'POST',
        data:{
            'auth' : auth,
            'auth1' : auth1
        },
        success:function(data)
        {
            if(data.validation)
            {
                if(type=="CD")
                {
                    contact1=data.content;
                    contacta=data.contenta;
                    $("#nom").val(contact1.Nom);
                    $("#prenom").val(contact1.Prenom);
                    $("#tel").val(contact1.Tel);
                    $("#email").val(contact1[3]);
                    $("#date").val(contact1.date_du_contact);
                    $("#groupe_foramation").val(contact1.Formation_Demmandee);
                    $("#formationdemandee").val(contact1.niveau_demande);
                    $("#naturecontact").val(contact1.Nature_de_Contact);
                    $("#ville").val(contact1.Ville);
                    $("#lycee").val(contact1.Etablissement);
                    $("#professeionmere").val(contact1.professionmere);
                    $("#professeionpere").val(contact1.professionpere);
                    $("#mailmere").val(contact1.Mail_Mere);
                    $("#mailpere").val(contact1.Mail_Pere);
                    $("#telmere").val(contact1.Tel_Mere);
                    $("#telpere").val(contact1.Tel_Pere);
                    $("#datenaissance").val(contact1.Date_de_Naissance);
                    $("#lieunaissance").val(contact1.Lieu_de_Naissance);
                    $("#adresse").val(contact1.Adresse);
                    $("#noma").val(contacta.Nom);
                    $("#prenoma").val(contacta.Prenom);
                    $("#tela").val(contacta.Tel);
                    $("#emaila").val(contacta[3]);
                    $("#datea").val(contacta.date_du_contact);
                    $("#groupe_foramationa").val(contacta.Formation_Demmandee);
                    $("#formationdemandeea").val(contacta.niveau_demande);
                    $("#naturecontacta").val(contacta.Nature_de_Contact);
                    $("#villea").val(contacta.Ville);
                    $("#lyceea").val(contacta.Etablissement);
                    $("#professeionmerea").val(contacta.professionmere);
                    $("#professeionperea").val(contacta.professionpere);
                    $("#mailmerea").val(contacta.Mail_Mere);
                    $("#mailperea").val(contacta.Mail_Pere);
                    $("#telmerea").val(contacta.Tel_Mere);
                    $("#telperea").val(contacta.Tel_Pere);
                    $("#datenaissancea").val(contacta.Date_de_Naissance);
                    $("#lieunaissancea").val(contacta.Lieu_de_Naissance);
                    $("#adressea").val(contacta.Adresse);
                    $("#test").val(contact1.test);
                    console.log(contact1);
                   if(contact1.Test_Passe==1)
                   {
                     $("#test_passe").val("oui");  
                   }
                   else
                   {
                       $("#test_passe").val("non");
                   }
                   if(contact1.depot_dossier==1)
                   {
                     $("#depot_dossier").val("oui");  
                   }
                   else
                   {
                       $("#depot_dossier").val("non");
                   }
                    $("#date_depot").val(contact1.date_depot); 
                   if(contact1.Frais_Dossier==1)
                   {
                     $("#frais_dossier").val("oui");  
                   }
                   else
                   {
                       $("#frais_dossier").val("non");
                   }
                    $("#tesa").val(contacta.test);
                   if(contacta.Test_Passe==1)
                   {
                     $("#test_passea").val("oui");  
                   }
                   else
                   {
                       $("#test_passea").val("non");
                   }
                   if(contacta.depot_dossier==1)
                   {
                     $("#depot_dossiera").val("oui");  
                   }
                   else
                   {
                       $("#depot_dossiera").val("non");
                   }
                    $("#date_depota").val(contacta.date_depot); 
                   if(contacta.Frais_Dossier==1)
                   {
                     $("#frais_dossiera").val("oui");  
                   }
                   else
                   {
                       $("#frais_dossiera").val("non");
                   }
                    $('#btn_delete').removeAttr("disabled");
                    $('#btn_add').removeAttr("disabled");
                    $('#btn_adda').removeAttr("disabled");
                    $('#btn_deletea').removeAttr("disabled");
                    $('#btn_add').attr("onclick","addupdatecontact('"+auth+"','')");
                    $('#btn_delete').attr("onclick","deletecontact('"+auth+"','')");
                    $('#btn_adda').attr("onclick","addupdatecontact('"+auth1+"','a')");
                    $('#btn_deletea').attr("onclick","deletecontact('"+auth1+"','a')");
                    $("#loading").hide();
                }
                else
                {
                    contact1=data.content;
                    contacta=data.contenta;
                    $("#nom").val(contact1.Nom);
                    $("#prenom").val(contact1.Prenom);
                    $("#tel").val(contact1.Tel);
                    $("#email").val(contact1[3]);
                    $("#date").val(contact1.Date);
                    $("#groupe_foramation").val(contact1.Groupe_Formation);
                    $("#formationdemandee").val(contact1.Formation_Demmandee);
                    $("#naturecontact").val(contact1.Nature_de_Contact);
                    $("#ville").val(contact1.Ville);
                    $("#lycee").val(contact1.Lycee);
                    $("#professeionmere").val(contact1.Profession_Mere);
                    $("#professeionpere").val(contact1.Profession_Pere);
                    $("#mailmere").val(contact1.Mail_Mere);
                    $("#mailpere").val(contact1.Mail_Pere);
                    $("#telmere").val(contact1.Tel_Mere);
                    $("#telpere").val(contact1.Tel_Pere);
                    $("#datenaissance").val(contact1.Date_de_Naissance);
                    $("#lieunaissance").val(contact1.Lieu_de_Naissance);
                    $("#adresse").val(contact1.Adresse);
                    $("#noma").val(contacta.Nom);
                    $("#prenoma").val(contacta.Prenom);
                    $("#tela").val(contacta.Tel);
                    $("#emaila").val(contacta[3]);
                    $("#datea").val(contacta.Date);
                    $("#groupe_foramationa").val(contacta.Groupe_Formation);
                    $("#formationdemandeea").val(contacta.Formation_Demmandee);
                    $("#naturecontacta").val(contacta.Nature_de_Contact);
                    $("#villea").val(contacta.Ville);
                    $("#lyceea").val(contacta.Lycee);
                    $("#professeionmerea").val(contacta.Profession_Mere);
                    $("#professeionperea").val(contacta.Profession_Pere);
                    $("#mailmerea").val(contacta.Mail_Mere);
                    $("#mailperea").val(contacta.Mail_Pere);
                    $("#telmerea").val(contacta.Tel_Mere);
                    $("#telperea").val(contacta.Tel_Pere);
                    $("#datenaissancea").val(contacta.Date_de_Naissance);
                    $("#lieunaissancea").val(contacta.Lieu_de_Naissance);
                    $("#adressea").val(contacta.Adresse);
                    $('#btn_delete').removeAttr("disabled");
                    $('#btn_add').removeAttr("disabled");
                    $('#btn_adda').removeAttr("disabled");
                    $('#btn_deletea').removeAttr("disabled");
                    $('#btn_add').attr("onclick","addupdatecontact('"+auth+"','')");
                    $('#btn_delete').attr("onclick","deletecontact('"+auth+"','')");
                    $('#btn_adda').attr("onclick","addupdatecontact('"+auth1+"','a')");
                    $('#btn_deletea').attr("onclick","deletecontact('"+auth1+"','a')");
                    $("#loading").hide();
                }
            }
        }
    });

}
function affictation_etb()
{
ids="(";
	for(i=0;i<$("#hidden_info").val();i++)
	{
		if($('#check_'+i).is(":checked"))
		{
			ids=ids+$('#check_'+i).val()+',';
		}
	}
	ids=ids+"0)";
	 $.ajax({
                type:'POST',
                data:{
                    'list_ids' : ids,
                    'nom_etb':$('#etb').val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert('ok');
                    }
                }
            });
}
function send_email()
{
        $("#search_btn").attr("disabled","disabled");
        $("#send_email").attr("disabled","disabled");
        $("#btn-save").attr("disabled","disabled");
        $("#btnrdv").attr("disabled","disabled");
        emailto="";
        objet_email=$("#objet_email").val();
        if( $('#nemail').val()!="")
        {
            if(isValidEmailAddress( $('#nemail').val()))
            {
                emailto=$('#nemail').val();
            }
            else
            {
                alert("Le nouvel email est incorrect");
                if(data.validation)
                {
                    $("#search_btn").removeAttr("disabled");
                    $("#send_email").removeAttr("disabled");
                    $("#btn-save").removeAttr("disabled");
                    $("#btnrdv").removeAttr("disabled");
                }
            }
        }
        else
        {
            if( $('#email').val()!="")
            {
                if(isValidEmailAddress( $('#email').val()))
                {
                    emailto=$('#email').val();
                }
                else
                {
                    alert("Erreur Merci de contacter le support");
                    if(data.validation)
                    {
                        $("#search_btn").removeAttr("disabled");
                        $("#send_email").removeAttr("disabled");
                        $("#btn-save").removeAttr("disabled");
                        $("#btnrdv").removeAttr("disabled");
                    }
                }
            }
        }
        if(emailto!="")
        {
            $.ajax({
                type:'POST',
                data:{
                    'content_email' : $('#content_email').val(),
                    'objet_email' : $('#objet_email').val(),
                    'emailto' : emailto
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        $("#search_btn").removeAttr("disabled");
                        $("#send_email").hide();
                        $("#btn-save").removeAttr("disabled");
                        $("#btnrdv").removeAttr("disabled");
                    }
                }
            });
        }

}
function search_contact()
{
    if($("#contact").val()=="")
    {
        $("#contact").focus();
    }
    else
    {
        $("#search_btn").attr("disabled","disabled");
        $.ajax({
            type:'POST',
            data:{
                'contact' : $("#contact").val()
            },
            success:function(data)
            {
                if(data.validation)
                {
                    txt=' <table id="example3" class="table table-bordered table-hover"> <thead> <tr> <th>Nom du contact</th> <th>Type de contact</th><th>Tel</th> <th>GSM</th> </tr> </thead> <tbody>';
                    txt=txt+data.value;
                    txt=txt+'</tbody> <tfoot> <tr> <th>Nom du contact</th> <th>Type de contact</th><th>Tel</th> <th>GSM</th> </tr> </tfoot> </table>';
                    $("#contentresult").html(txt);
                    activerdatatablesforme();
                }
            }
        });
    }
}

function showmymodal(num)
{
    $('#detail').modal('show');
    $('#contact_afficher').val($('#contact'+num).val());
    $('#nom_contact_afficher').val($('#nom_contact'+num).val());
    $('#date_afficher').val($('#date'+num).val());
    $('#heure_afficher').val($('#heure'+num).val());
    $('#rdv_effectuer_afficher').val($('#rdv_effectuer'+num).val());
    $('#contact_afficher').val($('#contact'+num).val());
    $('#commercial_afficher').val($('#commercial'+num).val());
    $('#observation_afficher').val($('#observation'+num).val());
    $('#date_saisie_afficher').val($('#date_saisie'+num).val());
    //$('#myModal').modal('toggle');
    //$('#myModal').modal('show');
    //$('#myModal').modal('hide');
}
function affeccterrdv(type,id)
{
    if(id!="" && $('#commercial').val()!="")
    {
        if(type=="Effectué")
        {
            $.ajax({
                type:'POST',
                data:{
                    'idrdv' : id,
                    'observation' : $('#observation').val(),
                    'commercial' : $('#commercial').val(),
                    'typerdv' : 1
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert(data.message);
                        window.location.href = data.url+"?page=rendez_vous";
                    }
                }
            });
        }
        else if(type=="NonEffectué")
        {
            $.ajax({
                type:'POST',
                data:{
                    'idrdv' : id,
                    'observation' : $('#observation').val(),
                    'commercial' : $('#commercial').val(),
                    'typerdv' : -1
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert(data.message);
                        window.location.href = data.url+"?page=rendez_vous";
                    }

                }
            });
        }
    }

}
function createrdv(id,campagne)
{
    if($("#date_rdv").val()=="" || $("#heure_rdv").val()=="")
    {
        alert("Merci de remplir les champs …");
    }
    else
    {
        $('#btncrp').attr('disabled', 'disabled');
        $.ajax({
            type:'POST',
            data:{
                'date_rdv' : $("#date_rdv").val(),
                'heure_rdv' : $("#heure_rdv").val(),
                'id_rdv' : id,
                'campagne_rdv' : campagne,
                'inscription_rdv' : $("#inscription_rdv").val()
            },
            success:function(data)
            {
                if(data.validation)
                {
                    alert(data.message);
                    $('#createrdv').modal('hide');
                }
                else if(! data.validation)
                {
                    alert(data.message);
                }
            }
        });
    }
}
function CreerCampagnereal(campagne,typetest,marche,nbrjour,i)
{
    $("#btncrp").attr('disabled', 'disabled');
    $.ajax({
        type:'POST',
        data:{
            'agents_myarray' : $("#agents").val(),
            'typetest' : typetest,
            'nbrjour' : nbrjour,
            'marche' : marche,
            'nomcompagne_myarray' : campagne
        },
        success:function(data)
        {
            if(data.validation)
            {
                $('#createcmp').modal('hide');
                alert("Opération effectuée avec succès …");
                $('#tr'+i).hide(500);
            }
        }
    });
}
function CreerCampagne(campagne,typetest,marche,nbrjour,i)
{
    agents=$('#agents').val();
    $('#btncrp').attr("onclick", "CreerCampagnereal('"+campagne+"','"+typetest+"','"+marche+"','"+nbrjour+"',"+i+");");

}
function transferer(contact)
{
    $("#transferer").attr('disabled', 'disabled');
    $.ajax({
        type:'POST',
        data:{
            'transferer' : contact
        },
        success:function(data)
        {
            if(data.validation)
            {
                alert("Le contact est transfrer...")
                window.location.href = data.url+"?page=recherche";
            }
        }
    });
}
function AddContactDirect(forcer)
{
    test=false;
    $(".erreur").hide();
    civilite=$("#civilite").val();
    nom=$("#nom").val();
    prenom=$("#prenom").val();
    niveaudemande=$("#niveaudemande").val();
    tel=$("#tel").val();
    email=$("#email").val();
    lycee=$("#lycee").val();
    professeionpere=$("#professeionpere").val();
    professeionmere=$("#professeionmere").val();
    telpere=$("#telpere").val();
    telmere=$("#telmere").val();
    mailpere=$("#mailpere").val();
    mailmere=$("#mailmere").val();
    date=$("#date").val();
    groupe_foramation=$("#groupe_foramation").val();
    formationdemandee=$("#formationdemandee").val();
    anneeuniver=$("#anneeuniver").val();
    anneeetude=$("#anneeetude").val();
    ville=$("#ville").val();
    datenaissance=$("#datenaissance").val();
    lieunaissance=$("#lieunaissance").val();
    adresse=$("#adresse").val();
    categorie=$("#categorie").val();
    naturecontact=$("#naturecontact").val();
    cp=$("#cp").val();
    gsm=$("#gsm").val();
    ville_lycee=$("#ville_lycee").val();
    interessepar=$("#interessepar").val();
    niveauetudes=$("#niveauetudes").val();
    branche=$("#branche").val();
    diplomeobtenu=$("#diplomeobtenu").val();
    anneeobtention=$("#anneeobtention").val();
    experienceprof=$("#experienceprof").val();
    recupar=$("#recupar").val();
    observations=$("#observations").val();
    marche=$("#marche").val();
    s1tc=$("#s1tc").val();
    s2tc=$("#s2tc").val();
    annuelletc=$("#annuelletc").val();
    s1bac1=$("#s1bac1").val();
    s2bac1=$("#s2bac1").val();
    annuellebac1=$("#annuellebac1").val();
    noteregional=$("#noteregional").val();
    s1bac2=$("#s1bac2").val();
    s2bac2=$("#s2bac2").val();
    annuellebac2=$("#annuellebac2").val();
    notenational=$("#notenational").val();
    notegenerale=$("#notegenerale").val();
    public =0;
    privee=0;
    mission=0;

    if ($('#teyp1').is(":checked"))
    {
        public = 1;
    }
    if ($('#teyp2').is(":checked"))
    {
        privee = 1;
    }
    if ($('#teyp3').is(":checked"))
    {
        mission = 1;
    }
    test_notes=true;
    if(s1tc!="")
    {
        if(!parseFloat(s1tc) || s1tc<0 || s1tc>20)
        {
            test_notes=false;
        }
    }
    if(s2tc!="")
    {
        if(!parseFloat(s2tc) || s2tc<0 || s2tc>20)
        {
            test_notes=false;
        }
    }
    if(annuelletc!="")
    {
        if(!parseFloat(annuelletc) || annuelletc<0 || annuelletc>20)
        {
            test_notes=false;
        }
    }
    if(s1bac1!="")
    {
        if(!parseFloat(s1bac1) || s1bac1<0 || s1bac1>20)
        {
            test_notes=false;
        }
    }
    if(s2bac1!="")
    {
        if(!parseFloat(s2bac1) || s2bac1<0 || s2bac1>20)
        {
            test_notes=false;
        }
    }
    if(annuellebac1!="")
    {
        if(!parseFloat(annuellebac1) || annuellebac1<0 || annuellebac1>20)
        {
            test_notes=false;
        }
    }
    if(noteregional!="")
    {
        if(!parseFloat(noteregional) || noteregional<0 || noteregional>20)
        {
            test_notes=false;
        }
    }
    if(s1bac2!="")
    {
        if(!parseFloat(s1bac2) || s1bac2<0 || s1bac2>20)
        {
            test_notes=false;
        }
    }
    if(s2bac2!="")
    {
        if(!parseFloat(s2bac2) || s2bac2<0 || s2bac2>20)
        {
            test_notes=false;
        }
    }
    if(annuellebac2!="")
    {
        if(!parseFloat(annuellebac2) || annuellebac2<0 || annuellebac2>20)
        {
            test_notes=false;
        }
    }
    if(notenational!="")
    {
        if(!parseFloat(notenational) || notenational<0 || notenational>20)
        {
            test_notes=false;
        }
    }
    if(notegenerale!="")
    {
        if(!parseFloat(notegenerale) || notegenerale<0 || notegenerale>20)
        {
            test_notes=false;
        }
    }
    if(nom != "" && prenom !="" && groupe_foramation !="" && date !="" && formationdemandee !="" && test_notes)
    {
        test=true;
        if( email!="")
        {
            if(isValidEmailAddress(email))
            {
                test=true;
            }
            else
            {
                test=false;
            }
        }
         if(forcer=='false')
        {
        $.ajax({
            type:'POST',
            data:{
                'nom_find' : nom,
                'prenom_find' :prenom
            },
            success:function(data)
            {
                 if(data.validation==true)
                {
                    window.scrollTo(0,0);
                    $("#message-div").show();
                    $("#message-div").html('<div class="alert alert-warning alert-dismissable"><button class="btn btn-warning btn-xs pull-right" style="border-color: white !important;" onclick="AddContactDirect(\'true\');" >Forcer la validation</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message+'' +
                    '</div>');
                    return false;
                }
                else
                {
                    if(test)
                    {
                        $.ajax({
                            type:'POST',
                            data:{
                                'civilite' : civilite ,
                                'nom' : nom ,
                                'prenom' : prenom ,
                                'tel' : tel ,
                                'etablisement' : $("#lycee").val(),
                                'email' : email ,
                                'lycee' : lycee,
                                'professeionpere' : professeionpere ,
                                'professeionmere' : professeionmere ,
                                'telpere' : telpere ,
                                'telmere' : telmere ,
                                'mailpere' : mailpere ,
                                'mailmere' : mailmere ,
                                'date' : date ,
                                'groupe_foramation' : groupe_foramation ,
                                'formationdemandee' : formationdemandee ,
                                'anneeuniver' : anneeuniver ,
                                'anneeetude' : anneeetude ,
                                'ville' : ville ,
                                'datenaissance' : datenaissance ,
                                'lieunaissance' : lieunaissance ,
                                'adresse' : adresse ,
                                'categorie' : categorie ,
                                'naturecontact' : naturecontact ,
                                'cp' : cp ,
                                'gsm' : gsm ,
                                'public' : public ,
                                'privee' : privee ,
                               'niveaudemande':niveaudemande,
                                'mission' : mission ,
                                'ville_lycee' : ville_lycee ,
                                'interessepar' : interessepar ,
                                'niveauetudes' : niveauetudes ,
                                'branche' : branche ,
                                'diplomeobtenu' : diplomeobtenu ,
                                'anneeobtention' : anneeobtention ,
                                'experienceprof' : experienceprof ,
                                'recupar' : recupar ,
                                'marche' : marche ,
                                'observations' : observations,
                                's1tc' : s1tc,
                                's2tc' : s2tc,
                                'annuelletc' : annuelletc,
                                's1bac1' : s1bac1,
                                's2bac1' : s2bac1,
                                'annuellebac1' : annuellebac1,
                                'noteregional' : noteregional,
                                's1bac2' : s1bac2,
                                's2bac2' : s2bac2,
                                'annuellebac2' : annuellebac2,
                                'notenational' : notenational,
                                'notegenerale' : notegenerale
                            },
                            success:function(data)
                            {
                                if(data.validation)
                                {
                                    setTimeout(function() {
                                        $('#message-div').fadeOut(500);
                                    }, 5000);
                                    $('#message-div').fadeIn(500);
                                    $('#message-div').html(data.message);
                                    $('html,body').scrollTop(0);
                                    $("#nom").val("");
                                    $("#prenom").val("");
                                    $("#tel").val("");
                                    $("#email").val("");
                                    $("#gsm").val("");
                                    $("#professeionpere").val("");
                                    $("#professeionmere").val("");
                                    $("#telpere").val("");
                                    $("#telmere").val("");
                                    $("#mailpere").val("");
                                    $("#mailmere").val("");
                                    $("#adresse").val("");
                                    $("#categorie").val("");
                                    $("#cp").val("");
                                    $("#interessepar").val("");
                                    $("#observations").val("");
                                    $("#s1tc").val("");
                                    $("#s2tc").val("");
                                    $("#annuelletc").val("");
                                    $("#s1bac1").val("");
                                    $("#s2bac1").val("");
                                    $("#annuellebac1").val("");
                                    $("#noteregional").val("");
                                    $("#s1bac2").val("");
                                    $("#s2bac2").val("");
                                    $("#annuellebac2").val("");
                                    $("#notenational").val("");
                                    $("#notegenerale").val("");
                                }
                                else
                                {
                                    $('#message-div').fadeIn(500);
                                    $('#message-div').html(data.message);
                                    $('html,body').scrollTop(0);
                                }
                            }
                        });
                    }
                    else
                    {
                        $('html,body').scrollTop(0);
                        $("#email").focus();
                        $(".erreur").fadeIn(500);
                    }
                }
            }
        });
        }
else if(forcer=='true')
        {
            if(test)
            {
                $.ajax({
                    type:'POST',
                    data:{
                        'civilite' : civilite ,
                        'nom' : nom ,
                        'prenom' : prenom ,
                        'tel' : tel ,
                        'email' : email ,
                        'lycee' : lycee ,
                        'professeionpere' : professeionpere ,
                        'professeionmere' : professeionmere ,
                        'telpere' : telpere ,
                        'telmere' : telmere ,
                        'mailpere' : mailpere ,
                        'mailmere' : mailmere ,
                        'date' : date ,
                        'groupe_foramation' : groupe_foramation ,
                        'formationdemandee' : formationdemandee ,
                        'anneeuniver' : anneeuniver ,
                        'anneeetude' : anneeetude ,
                        'ville' : ville ,
                        'datenaissance' : datenaissance ,
                        'lieunaissance' : lieunaissance ,
                        'adresse' : adresse ,
                        'categorie' : categorie ,
                        'naturecontact' : naturecontact ,
                        'cp' : cp ,
                        'gsm' : gsm ,
                        'public' : public ,
                        'privee' : privee ,
                        'mission' : mission ,
                        'ville_lycee' : ville_lycee ,
                        'interessepar' : interessepar ,
                        'niveauetudes' : niveauetudes ,
                        'branche' : branche ,
                        'diplomeobtenu' : diplomeobtenu ,
                        'anneeobtention' : anneeobtention ,
                        'experienceprof' : experienceprof ,
                        'recupar' : recupar ,
                        'marche' : marche ,
                        'observations' : observations,
                        's1tc' : s1tc,
                        's2tc' : s2tc,
                        'annuelletc' : annuelletc,
                        's1bac1' : s1bac1,
                        's2bac1' : s2bac1,
                        'annuellebac1' : annuellebac1,
                        'noteregional' : noteregional,
                        's1bac2' : s1bac2,
                        's2bac2' : s2bac2,
                        'annuellebac2' : annuellebac2,
                        'notenational' : notenational,
                        'notegenerale' : notegenerale
                    },
                    success:function(data)
                    {
                        if(data.validation)
                        {
                            setTimeout(function() {
                                $('#message-div').fadeOut(500);
                            }, 5000);
                            $('#message-div').fadeIn(500);
                            $('#message-div').html(data.message);
                            $('html,body').scrollTop(0);
                            $("#nom").val("");
                            $("#prenom").val("");
                            $("#tel").val("");
                            $("#email").val("");
                            $("#date").val("");
                            $("#s1tc").val("");
                            $("#s2tc").val("");
                            $("#annuelletc").val("");
                            $("#s1bac1").val("");
                            $("#s2bac1").val("");
                            $("#annuellebac1").val("");
                            $("#noteregional").val("");
                            $("#s1bac2").val("");
                            $("#s2bac2").val("");
                            $("#annuellebac2").val("");
                            $("#notenational").val("");
                            $("#notegenerale").val("");
                        }
                        else
                        {
                            $('#message-div').fadeIn(500);
                            $('#message-div').html(data.message);
                            $('html,body').scrollTop(0);
                        }
                    }
                });
            }
            else
            {
                $('html,body').scrollTop(0);
                $("#email").focus();
                $(".erreur").fadeIn(500);
            }
        }
    }
    else
    {
        if(nom == "")
        {
            $("#nom").focus();
            $('#nom').css("border-color","#F44336");
            setTimeout(function(){ $('#nom').css("border-color","#d2d6de");  }, 700);
        }
        else
        {
            $('html,body').scrollTop(0);
            if(prenom =="")
            {
                $("#prenom").focus();
                $('#prenom').css("border-color","#F44336");
                setTimeout(function(){ $('#prenom').css("border-color","#d2d6de");  }, 700);
            }
            else
            {
                if(tel =="")
                {
                    $("#tel").focus();
                    $('#tel').css("border-color","#F44336");
                    setTimeout(function(){ $('#tel').css("border-color","#d2d6de");  }, 700);
                }
                else
                {
                    if(groupe_foramation =="")
                    {
                        $("#groupe_foramation").focus();
                        $('#groupe_foramation').css("border-color","#F44336");
                        setTimeout(function(){ $('#groupe_foramation').css("border-color","#d2d6de");  }, 700);
                    }
                    else
                    {
                        if(date =="")
                        {
                            $("#date").focus();
                            $('#date').css("border-color","#F44336");
                            setTimeout(function(){ $('#date').css("border-color","#d2d6de");  }, 700);
                        }
                        else
                        {
                            if(formationdemandee =="")
                            {
                                $("#formationdemandee").focus();
                                $('#formationdemandee').css("border-color","#F44336");
                                setTimeout(function(){ $('#formationdemandee').css("border-color","#d2d6de");  }, 700);
                            }
                             else
                            {
                                if(s1tc!="")
                                {
                                    if(!parseFloat(s1tc))
                                    {
                                        $("#s1tc").focus();
                                        $('#s1tc').css("border-color","#F44336");
                                        setTimeout(function(){ $('#s1tc').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(s2tc!="")
                                {
                                    if(!parseFloat(s2tc))
                                    {
                                        $("#s2tc").focus();
                                        $('#s2tc').css("border-color","#F44336");
                                        setTimeout(function(){ $('#s2tc').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(annuelletc!="")
                                {
                                    if(!parseFloat(annuelletc))
                                    {
                                        $("#annuelletc").focus();
                                        $('#annuelletc').css("border-color","#F44336");
                                        setTimeout(function(){ $('#annuelletc').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(s1bac1!="")
                                {
                                    if(!parseFloat(s1bac1))
                                    {
                                        $("#s1bac1").focus();
                                        $('#s1bac1').css("border-color","#F44336");
                                        setTimeout(function(){ $('#s1bac1').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(s2bac1!="")
                                {
                                    if(!parseFloat(s2bac1))
                                    {
                                        $("#s2bac1").focus();
                                        $('#s2bac1').css("border-color","#F44336");
                                        setTimeout(function(){ $('#s2bac1').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(annuellebac1!="")
                                {
                                    if(!parseFloat(annuellebac1))
                                    {
                                        $("#annuellebac1").focus();
                                        $('#annuellebac1').css("border-color","#F44336");
                                        setTimeout(function(){ $('#annuellebac1').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(noteregional!="")
                                {
                                    if(!parseFloat(noteregional))
                                    {
                                        $("#noteregional").focus();
                                        $('#noteregional').css("border-color","#F44336");
                                        setTimeout(function(){ $('#noteregional').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(s1bac2!="")
                                {
                                    if(!parseFloat(s1bac2))
                                    {
                                        $("#s1bac2").focus();
                                        $('#s1bac2').css("border-color","#F44336");
                                        setTimeout(function(){ $('#s1bac2').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(s2bac2!="")
                                {
                                    if(!parseFloat(s2bac2))
                                    {
                                        $("#s2bac2").focus();
                                        $('#s2bac2').css("border-color","#F44336");
                                        setTimeout(function(){ $('#s2bac2').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(annuellebac2!="")
                                {
                                    if(!parseFloat(annuellebac2))
                                    {
                                        $("#annuellebac2").focus();
                                        $('#annuellebac2').css("border-color","#F44336");
                                        setTimeout(function(){ $('#annuellebac2').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(notenational!="")
                                {
                                    if(!parseFloat(annuellebac2))
                                    {
                                        $("#notenational").focus();
                                        $('#notenational').css("border-color","#F44336");
                                        setTimeout(function(){ $('#notenational').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                                if(notegenerale!="")
                                {
                                    if(!parseFloat(notegenerale))
                                    {
                                        $("#notenational").focus();
                                        $('#notenational').css("border-color","#F44336");
                                        setTimeout(function(){ $('#notenational').css("border-color","#d2d6de");  }, 700);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $(".erreur").fadeIn(500);
    }
}
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}
function changerphoning()
{
    $("#etatphoning").hide();
    $("#selection").hide();
    $(".loading").show();
    if($("#typecontact").val()=="--")
    {
        $("#typecontact").show();
        $("#selection").show();
        $(".loading").hide();
        $("#etatphoning").html("");
        return false;
    }
    else
    {
        $.ajax({
            type:'POST',
            data:{
                'typecontact' : $("#typecontact").val()
            },
            success:function(data)
            {
                $("#etatphoning").show();
                $("#selection").show();
                $(".loading").hide();
                $("#etatphoning").html(data);
            }
        });
    }
}
function FiltrerCompgne(autorisation)
{
    $("#filtrer").hide();
    $("#btnfilter").show();
    if(autorisation == 1)
    {
    	agents = $("#agents").val();
    }
    else
    {
    	agents = "";
    }
    if($("#anneeuniver").val() != "" && $("#typecontact").val() != "--" && $("#formation").val() != "" && $("#marche").val() != "" && $("#etatphoning").val() != "")
    {
        etatphoning=$("#etatphoning").val();
        $.ajax({
            type:'POST',
            data:{
                'agents' : agents,
                'anneeuniver' : $("#anneeuniver").val(),
                'typecontactlist' : $("#typecontact").val(),
                'formation' : $("#formation").val(),
                'marche' : $("#marche").val(),
                'agents_autorisation' : autorisation,
                'nature_contact' : $("#nature_contact").val(),   
                'nature_contact_hors' : $("#nature_contact_hors").val(),
                'Ville_hors' : $("#Ville_hors").val(),
                'Lycee_hors' : $("#Lycee_hors").val(),
                'Ville_Lycee_hors' : $("#Ville_Lycee_hors").val(),
                'Test_hors' : $("#Test_hors").val(),
                'Formation_demande_hors' : $("#Formation_demande_hors").val(),
                'etatphoning' : etatphoning
            },
            success:function(data)
            {
                if(data.validation)
                {
                    $("#filtrer").show();
                    $("#biglistcontact").show();
                    $("#listcontact").show();
                    $("#btnfilter").hide();
                    $("#listofthis").html(data.result);
                    $("#btn_create").attr('onclick','createcampagne('+data.nbrline+',\''+autorisation+'\');');
                    activerdatatables();
                }
            }
        });
    }
    else{
        $("#filtrer").show();
        $("#btnfilter").hide();
        alert("S'il vous plaît remplir tous les champs !");
    }
}
function createcampagne(nbr,agents_autorisation)
{
ObservationEmail=$("#ObservationEmail").val();
    mytest=false;
    myarray= [];
    j=0;
    for(i=1;i<=nbr;i++)
    {
        if ($('#LCT'+i).is(":checked"))
        {
            mytest=true;
            myarray[j]=$('#hidden'+i).val();
            j++;
        }
    }
    if(mytest)
    {
        $('#listofthis').html('<div class="text-center"><img src="dist/img/loading.gif" width="10%"></div>');
        if(agents_autorisation==0)
        {
        	agents_myarray="just you";
        }
        else
        {
        	agents_myarray=$("#agents").val();
        }
        console.log(myarray);
        var value = CKEDITOR.instances['scripte'].getData();
        var email_cmp = CKEDITOR.instances['email_cmp'].getData();
        var dt = new Date();
        var date = dt.getDate()+'_'+ (parseInt(dt.getMonth())+1)+'_'+ dt.getFullYear()+'_'+ dt.getHours() + "_" + dt.getMinutes() + "_" + dt.getSeconds();
        if(email_cmp!="")
        {
        	cmp_name=$("#nomcompagne").val();
        	cmp_name=cmp_name.replace("'", "_");
            $.ajax({
                type:'POST',
                data:{
                    'myarray' : myarray,
                    'agents_autorisation' : agents_autorisation,
                    'script' : value,
                    'email_cmp' : email_cmp,
                    'etatphoning' : $("#etatphoning").val(),
                    'nbrtotale':j,
                    'agents_myarray' : agents_myarray,
                    'anneeuniver_myarray' : $("#anneeuniver").val(),
                    'ObservationEmail_cmp' : ObservationEmail,
                    'nomcompagne_myarray' : $("#nomcompagne").val()+"_"+date,
                    'typecontact_myarray' : $("#typecontact").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        $('#listofthis').html(data.message);
                        window.setTimeout(function(){

                            // Move to a new location or you can do something else
                            window.location.href = data.url+"?page=listcompagneclp";

                        }, 1000);
                    }
                }
            });
        }
        else
        {
            alert("Email de campagne est obligatoire")
        }

    }
}
function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            console.log(i)
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}
function vidercontent()
{
    $('#biglistcontact').hide();
    $('#listofthis').html("");
}
function getfichecontact(campagne,stat,id)
{
    if(stat==1)
    {

        if(campagne!="")
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagne' : campagne
                },
                success:function(data)
                {
                    if(data.validation)
                    {
						$('#ntel').val("");
						$('#etapephoning_ans').val("");
						$('#observation_ans').val("");
						$('#nemail').val("");
                        $('#observation').val("");
                        $("#s1tc").val("");
                        $("#s2tc").val("");
                        $("#annuelletc").val("");
                        $("#s1bac1").val("");
                        $("#s2bac1").val("");
                        $("#annuellebac1").val("");
                        $("#noteregional").val("");
                        $("#s1bac2").val("");
                        $("#s2bac2").val("");
                        $("#annuellebac2").val("");
                        $("#notenational").val("");
                        $("#notegenerale").val("");
                        $('#Status_rdv').val("");
                        document.getElementById('rdv_non').checked=false;
                        document.getElementById('rdv_oui').checked=false;
                        $("#rdv_oui").prop("checked", false);
                        $("#rdv_non").prop("checked", false);
						$("#send_email").removeAttr("disabled");
						$('#ntel').val(data.data.Ntel);
						$('#nemail').val(data.data.Nemail);
						$('#nom').val(data.data.Nom);
                        $('#prenom').val(data.data.Prenom);
                        $('#nature_contact').val(data.data.Nature_de_Contact);
                        $('#ville').val(data.data.Ville);
                        $('#ville_lycee').val(data.data.Ville_Lycee);
                        $('#formation_containaire').html(data.data.Formation_Demmandee);
                        $('#niveau_etudes').val(data.data.Niveau_des_etudes);
                        $('#gsm').val(data.data.GSM);
                        $('#telephone').val(data.data.Tel);
                        $('#tel_pere').val(data.data.Tel_Pere);
                        $('#tel_mere').val(data.data.Tel_Mere);
                        $('#email').val(data.data.Email);
                        $('#etatpephonig').html(data.data.etphoning);
                        $('#adresse').val(data.data.Adresse);
                        $('#scripte_content').html(data.data.script);
                        $('#content_email').val(data.data.email_send);
                        $('#objet_email').val(data.data.object_send);
                        for(k=0;k<data.data.Observations.length;k++)
                        {
                            $('#observation_ans').val("+ "+data.data.Observations[k]+"\n"+$('#observation_ans').val());
                        }
                        if(data.data.Etape_Phoning!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning actuale : "+data.data.Etape_Phoning);}
                        if((data.data.Etape_Phoning1)!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning1 : "+data.data.Etape_Phoning1);}
                        if(data.data.Etape_Phoning2!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning2 : "+data.data.Etape_Phoning2);}
                        if(data.data.Etape_Phoning3!=null){ $('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning3 : "+data.data.Etape_Phoning3);}
                        if(data.data.Etape_Phoning4!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning4 : "+data.data.Etape_Phoning4);}
                        if(data.data.Etape_Phoning5!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning5 : "+data.data.Etape_Phoning5);}
                        if(data.data.Etape_Phoning6!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning6 : "+data.data.Etape_Phoning6);}
                        if(data.data.Etape_Phoning7!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning7 : "+data.data.Etape_Phoning7);}
                        if(data.data.Etape_Phoning8!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning8 : "+data.data.Etape_Phoning8);}
                        if(data.data.Etape_Phoning9!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning9 : "+data.data.Etape_Phoning9);}
                        if(data.data.Etape_Phoning10!=null){$('#etapephoning_ans').val($('#etapephoning_ans').val()+"\n* Etape Phoning10 : "+data.data.Etape_Phoning10);}
                        $("#s1tc").val(data.data.s1tc);
                        $("#s2tc").val(data.data.s2tc);
                        $("#annuelletc").val(data.data.annuelletc);
                        $("#s1bac1").val(data.data.s1bac1);
                        $("#s2bac1").val(data.data.s2bac1);
                        $("#annuellebac1").val(data.data.annuellebac1);
                        $("#noteregional").val(data.data.noteregional);
                        $("#s1bac2").val(data.data.s1bac2);
                        $("#s2bac2").val(data.data.s2bac2);
                        $("#annuellebac2").val(data.data.annuellebac2);
                        $("#notenational").val(data.data.notenational);
                        $("#notegenerale").val(data.data.notegenerale);
						$('#send_email').show();
                        $('#btn-save').attr("onclick","getfichecontact('"+campagne+"',0,'"+data.data.id+"')");
                        console.log(data.data);
                        //$('#telesip').attr("href","sip:"+data.data.Tel);
                        //$('#telpereesip').attr("href","sip:"+data.data.Tel_Pere);
                        //$('#telemeresip').attr("href","sip:"+data.data.Tel_Mere);
                        //$('#telesip').css("background_color","#50de9c");
                        $('#telesip .fa').css("color","white");
                        $("#btnrdv").attr("onclick","createrdv('"+data.data.id+"','"+campagne+"')");
                        if(data.data.GSM != "")
                        {
                        window.location.replace("sip:"+data.data.GSM);
                        }
                        
                    }
                    else{
                        alert("La campagne est compléte");
                        window.location.replace("/");
                    }
                }
            });
        }
        else
        {
            window.location.replace("/upm_crm");
        }
    }
    else if(stat==0)
    {
        s1tc=$("#s1tc").val();
        s2tc=$("#s2tc").val();
        annuelletc=$("#annuelletc").val();
        s1bac1=$("#s1bac1").val();
        s2bac1=$("#s2bac1").val();
        annuellebac1=$("#annuellebac1").val();
        noteregional=$("#noteregional").val();
        formation_demandee=$("#formation_demandee").val();
        s1bac2=$("#s1bac2").val();
        s2bac2=$("#s2bac2").val();
        annuellebac2=$("#annuellebac2").val();
        notenational=$("#notenational").val();
        notegenerale=$("#notegenerale").val();
        test_notes=true;
        status_rdv="";
        etatpephonig="";
        etat_rdv="";
        if(document.getElementById('rdv_non').checked==true)
        {
            if($('#Status_rdv').val()=="")
            {
                alert("Merci de selectioné le status de RDV");return false;
            }
            else
            {
                etatpephonig="Qualifié en cours";
                status_rdv=$('#Status_rdv').val();
                etat_rdv=0;
            }
            
        }
        else if(document.getElementById('rdv_oui').checked==true)
        {
            if($('#Status_rdv').val()=="")
            {
                etatpephonig="Qualifié";
                status_rdv="Qualifié";
                etat_rdv=1;
            }
            else
            {
                etatpephonig="Qualifié";
                status_rdv=$('#Status_rdv').val();
                etat_rdv=1;
            }
        }
        else if(etatpephonig=="" && etat_rdv=="" && status_rdv=="")
        {
            etatpephonig="NA";
        }
        if(!test_notes)
        {
            alert("Merci de verifier les notes ...");
        }
        else
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : campagne,
                    'status_rdv' : status_rdv,
                    'etat_rdv' : etat_rdv,
                    'etapephoning' : etatpephonig,
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val(),
                    's1tc': $("#s1tc").val(),
                    's2tc': $("#s2tc").val(),
                    'annuelletc':$("#annuelletc").val(),
                    'formation_demandee':formation_demandee,
                    's1bac1':$("#s1bac1").val(),
                    's2bac1':$("#s2bac1").val(),
                    'annuellebac1':$("#annuellebac1").val(),
                    'noteregional':$("#noteregional").val(),
                    's1bac2':$("#s1bac2").val(),
                    's2bac2':$("#s2bac2").val(),
                    'annuellebac2':$("#annuellebac2").val(),
                    'notenational':$("#notenational").val(),
                    'notegenerale':$("#notegenerale").val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        getfichecontact(data.message,1,0);
                    }
                }
            });
        }
    }
    else if(stat==5)
    {
        if($('#etatpephonig').val()=="")
        {
            alert("Merci de Selectionner Etape Phoning");
        }
        else
        {
            $.ajax({
                type:'POST',
                data:{
                    'campagnetest' : campagne,
                    'etapephoning' : $('#etatpephonig').val(),
                    'ntel' : $('#ntel').val(),
                    'idid' : id,
                    'observation' : $('#observation').val(),
                    'nemail' : $('#nemail').val()
                },
                success:function(data)
                {
                    if(data.validation)
                    {
                        alert(" Opération effectuée avec succès … ");
                    }
                }
            });
        }
    }

}
function changecolor(idhref)
{
    if(idhref=="gsmsip")
    {
        $('#gsmsip').css("background-color","#50de9c");
        $('#gsmsip .fa').css("color","white");
        $('#telesip').css("background-color","#fff");
        $('#telesip .fa').css("color","#555");
        $('#telpereesip').css("background-color","#fff");
        $('#telpereesip .fa').css("color","#555");
        $('#telemeresip').css("background-color","#fff");
        $('#telemeresip .fa').css("color","#555");
        $('#telnv').css("background-color","#fff");
        $('#telnv .fa').css("color","#555");
        if($("#gsm").val()=="" || $("#gsm").val()==null )
        {
            console.log("false value");
            return false;
        }
        else
        {
            window.location.replace("sip:"+$("#gsm").val());
        }
    }
    if(idhref=="telesip")
    {
        $('#telesip').css("background-color","#50de9c");
        $('#telesip .fa').css("color","white");
        $('#telpereesip').css("background-color","#fff");
        $('#telpereesip .fa').css("color","#555");
        $('#telemeresip').css("background-color","#fff");
        $('#telemeresip .fa').css("color","#555");
        $('#telnv').css("background-color","#fff");
        $('#telnv .fa').css("color","#555");
        $('#gsmsip').css("background-color","#fff");
        $('#gsmsip .fa').css("color","#555");
        if($("#telephone").val()=="" || $("#telephone").val()==null )
        {
            console.log("false value");
            return false;
        }
        else
        {
            window.location.replace("sip:"+$("#telephone").val());
        }
    }
    if(idhref=="telpereesip")
    {
        $('#telpereesip').css("background-color","#50de9c");
        $('#telpereesip .fa').css("color","white");
        $('#telesip').css("background-color","#fff");
        $('#telesip .fa').css("color","#555");
        $('#telemeresip').css("background-color","#fff");
        $('#telemeresip .fa').css("color","#555");
        $('#telnv').css("background-color","#fff");
        $('#telnv .fa').css("color","#555");
        $('#gsmsip').css("background-color","#fff");
        $('#gsmsip .fa').css("color","#555");
        if($("#tel_pere").val()=="" || $("#tel_pere").val()==null )
        {
            console.log("false value");
            return false;
        }
        else
        {
            window.location.replace("sip:"+$("#tel_pere").val());
        }
    }
    if(idhref=="telemeresip")
    {
        $('#telemeresip').css("background-color","#50de9c");
        $('#telemeresip .fa').css("color","white");
        $('#telesip').css("background-color","#fff");
        $('#telesip .fa').css("color","#555");
        $('#telpereesip').css("background-color","#fff");
        $('#telpereesip .fa').css("color","#555");
        $('#telnv').css("background-color","#fff");
        $('#telnv .fa').css("color","#555");
        $('#gsmsip').css("background-color","#fff");
        $('#gsmsip .fa').css("color","#555");
        if($("#tel_mere").val()=="" || $("#tel_mere").val()==null )
        {
            console.log("false value");
            return false;
        }
        else
        {
            window.location.replace("sip:"+$("#tel_mere").val());
        }
    }
    if(idhref=="telnv")
    {
        $('#telnv').css("background-color","#50de9c");
        $('#telnv .fa').css("color","white");
        $('#telesip').css("background-color","#fff");
        $('#telesip .fa').css("color","#555");
        $('#telpereesip').css("background-color","#fff");
        $('#telpereesip .fa').css("color","#555");
        $('#telemeresip').css("background-color","#fff");
        $('#telemeresip .fa').css("color","#555");
        $('#gsmsip').css("background-color","#fff");
        $('#gsmsip .fa').css("color","#555");
        if($("#ntel").val()=="" || $("#ntel").val()==null )
        {
            console.log("false value");
            return false;
        }
        else
        {
            console.log("false true");
            window.location.replace("sip:"+$("#ntel").val());
        }
    }
}
function Verrouiller(i,campagne)
{
    $('#tr'+i+' button').attr("disabled","disabled");
    $('#tr'+i+' button').attr("onclick","return false");
    $.ajax({
        type:'POST',
        data:{
            'campagnename' : campagne
        },
        success:function(data)
        {
            if(data.validation)
            {
                $('#tr'+i).fadeOut(500);
            }
        }
    });
    return false;
}

function MettreAjourSuperCommercial()
{
        var civilite = $('#civilite').val();
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var lieunaissance = $('#lieunaissance').val();
        var email = $('#mail').val();
       var contactsuivipar = $('#suivipar').val();
        var datenaissance = $('#datenaissance').val();
        var gsm = $('#gsm').val();
        var nationalite = $('#nationalite').val();
        var telephone = $('#telephone').val();
        var ville = $('#ville').val();
        var datecontact = $('#datecontact').val();
        var adresse = $('#adresse').val();
        var nomprenommere = $('#nomprenommere').val();
        var nomprenompere = $('#nomprenompere').val();
        var professionpere = $('#professpere').val();
        var professionmere = $('#professmere').val();
        var telmere = $('#telmere').val();
        var telpere = $('#telpere').val();
        var mailpere = $('#mailpere').val();
        var mailmere = $('#mailmere').val();
        var suivipar = $('#suivipar').val();
        var adresseparents = $('#adresseparents').val();
        var niveaueudes = $('#niveauetudes').val();
        var diplomesobtenues = $('#diplomeobt').val();
        var anneeobtention = $('#anneeobtention').val();
        var seriebac = $('#seriebac').val();
        var etablissement = $('#etablissement').val();
        var naturecontact = $('#naturecontact').val();
        var formationdemande = $('#formationdemandee').val();
        var niveaudemande = $('#niveaudemande').val();
        var recupar = $('#recupar').val();
        var obseravtions = $('#observations').val();
        var visite = $('#visite').is(':checked');
        var lyceepublic = $('#lyceepublic').is(':checked');
        var lyceeprive = $('#lyceeprive').is(':checked');
        var lyceemission = $('#lyceemission').is(':checked');
        var contactsuitea = $('#contactsuitea').val();
        if (visite) visite = 1; else visite = 0;
        if (lyceemission) lyceemission = 1; else lyceemission = 0;
        if (lyceeprive) lyceeprive = 1; else lyceeprive = 0;
        if (lyceepublic) lyceepublic = 1; else lyceepublic = 0;
        var Annuniv = $('#anneeuniv').val();
        var statutcontact = $('#statutcontact').val();
                $.ajax({
                    method: "POST",
                    data: {
                        "civilite": civilite,
                        "stautcontact": statutcontact,
                        "nom": nom,
                        "contactsuivipar":contactsuivipar,
                        "prenom": prenom,
                        "datenaissance": datenaissance,
                        "lieunaissance": lieunaissance,
                        "email": email,
                        "gsm": gsm,
                        "datecontact": datecontact,
                        "nationalite": nationalite,
                        "telephone": telephone,
                        "ville": ville,
                        "adresse": adresse,
                        "nomprenommere": nomprenommere,
                        "nomprenompere": nomprenompere,
                        "professionpere": professionpere,
                        "professionmere": professionmere,
                        "telmere": telmere,
                        "suivipar":suivipar,
                        "telpere": telpere,
                        "mailpere": mailpere,
                        "mailmere": mailmere,
                        "adresseparents": adresseparents,
                        "niveauetudes": niveaueudes,
                        "diplomesobtenus": diplomesobtenues,
                        "anneeobtention": anneeobtention,
                        "seriebac": seriebac,
                        "etablissement": etablissement,
                        "natureconatct": naturecontact,
                        
                        "formationdemande": formationdemande,
                        "niveaudemande": niveaudemande,
                        "recupar": recupar,
                        "observations": obseravtions,
                        "visite": visite,
                        "lyceepublic": lyceepublic,
                        "lyceeprive": lyceeprive,
                        "lyceemission": lyceemission,
                        "contacsuitea": contactsuitea,
                        "anneeuniv": Annuniv
                                  },
                    success: function (data) {
                        $('#etatmodif').html('Modifcation avec sucess');
                        $('#etatmodif').fadeIn(1000);
                        $('#etatmodif').fadeOut(1000);
                        document.body.scrollTop = document.documentElement.scrollTop = 0;
                    }
                });
				
}
          
    
function MettreAjour(type) {
   
    
    if(type=='D') {
        var civilite = $('#civilite').val();
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var lieunaissance = $('#lieunaissance').val();
        var email = $('#mail').val();
       var contactsuivipar = $('#suivipar').val();
        var datenaissance = $('#datenaissance').val();
        var gsm = $('#gsm').val();
        var nationalite = $('#nationalite').val();
        var telephone = $('#telephone').val();
        var ville = $('#ville').val();
        var datecontact = $('#datecontact').val();
        var adresse = $('#adresse').val();
        var nomprenommere = $('#nomprenommere').val();
        var nomprenompere = $('#nomprenompere').val();
        var professionpere = $('#professpere').val();
        var professionmere = $('#professmere').val();
        var telmere = $('#telmere').val();
        var telpere = $('#telpere').val();
        var mailpere = $('#mailpere').val();
        var mailmere = $('#mailmere').val();
        var adresseparents = $('#adresseparents').val();
        var niveaueudes = $('#niveauetudes').val();
        var diplomesobtenues = $('#diplomeobt').val();
        var anneeobtention = $('#anneeobtention').val();
        var seriebac = $('#seriebac').val();
        var etablissement = $('#etablissement').val();
        var naturecontact = $('#naturecontact').val();
        var resident = $('#resident').is(':checked');
        if (resident) resident = 1; else resident = 0;
        var typeresidence = $('#typeresidence').val();
        var etatdossier = $('#etatdossier').val();
        var formationdemande = $('#formationdemandee').val();
        var niveaudemande = $('#niveaudemande').val();
        var recupar = $('#recupar').val();
        var obseravtions = $('#observations').val();
        var langue1 = $('#langue1').val();
        var langue2 = $('#langue2').val();
        var langue3 = $('#langue3').val();
        var visite = $('#visite').is(':checked');
        var lyceepublic = $('#lyceepublic').is(':checked');
        var lyceeprive = $('#lyceeprive').is(':checked');
        var lyceemission = $('#lyceemission').is(':checked');
        var contactsuitea = $('#contactsuitea').val();
        var test = $('#test').val();
        var datetest = $('#datetest').val();
        var depotdossier = $('#depotdossier').is(':checked');
        var datedpotdossier = $('#datedepotdossier').val();
        if (visite) visite = 1; else visite = 0;
        if (lyceemission) lyceemission = 1; else lyceemission = 0;
        if (lyceeprive) lyceeprive = 1; else lyceeprive = 0;
        if (lyceepublic) lyceepublic = 1; else lyceepublic = 0;
        if (depotdossier) depotdossier = 1; else depotdossier = 0;
        var fraisdossier = $('#fraisdossier').is(':checked');
        if (fraisdossier) fraisdossier = 1; else fraisdossier = 0;
        var datefrais = $('#datefrais').val();
        var marche = $('#marche').val();
        var Annuniv = $('#anneeuniv').val();
        var inscrit = $('#inscrit').is(':checked');
        if (inscrit) inscrit = 1; else inscrit = 0;
        var dateinscription = $('#dateinscription').val();
        var envoiconvocation = $('#envoiconvocation').is(':checked');
        if (envoiconvocation) envoiconvocation = 1; else envoiconvocation = 0;
        var testpasse = $('#testpasse').is(':checked');
        if (testpasse) testpasse = 1; else testpasse = 0;
        var pieces = $('#pieces').is(':checked');
        if (pieces) pieces = 1; else pieces = 0;
        var absetest = $('#abseTest').is(':checked');
        if (absetest) absetest = 1; else absetest = 0;
        var datepieces = $('#datepieces').val();
        var pays = $('#pays').val();
        var motif = $('#motif').val();
        var observationsresultat = $('#observationsresultat').val();
        var resultat = $('#resultat').val();
        var numerodossier = null;
        var inscriptionrecupar = $('#inscriptionrecupar').val();
        var statutcontact = $('#statutcontact').val();
        var valiadeform = true;
        var s1tc=$("#s1tc").val();
        var s2tc=$("#s2tc").val();
        var annuelletc=$("#annuelletc").val();
        var s1bac1=$("#s1bac1").val();
        var s2bac1=$("#s2bac1").val();
        var annuellebac1=$("#annuellebac1").val();
        var noteregional=$("#noteregional").val();
        var s1bac2=$("#s1bac2").val();
        var s2bac2=$("#s2bac2").val();
        var annuellebac2=$("#annuellebac2").val();
        var notenational=$("#notenational").val();
        var notegenerale=$("#notegenerale").val();
        var test_notes;
        test_notes=true;
        /*if(s1tc!="")
        {
            if(!parseFloat(s1tc) || s1tc<0 || s1tc>20)
            {
                test_notes=false;
            }
        }
        if(s2tc!="")
        {
            if(!parseFloat(s2tc) || s2tc<0 || s2tc>20)
            {
                test_notes=false;
            }
        }
        if(annuelletc!="")
        {
            if(!parseFloat(annuelletc) || annuelletc<0 || annuelletc>20)
            {
                test_notes=false;
            }
        }
        if(s1bac1!="")
        {
            if(!parseFloat(s1bac1) || s1bac1<0 || s1bac1>20)
            {
                test_notes=false;
            }
        }
        if(s2bac1!="")
        {
            if(!parseFloat(s2bac1) || s2bac1<0 || s2bac1>20)
            {
                test_notes=false;
            }
        }
        if(annuellebac1!="")
        {
            if(!parseFloat(annuellebac1) || annuellebac1<0 || annuellebac1>20)
            {
                test_notes=false;
            }
        }
        if(noteregional!="")
        {
            if(!parseFloat(noteregional) || noteregional<0 || noteregional>20)
            {
                test_notes=false;
            }
        }
        if(s1bac2!="")
        {
            if(!parseFloat(s1bac2) || s1bac2<0 || s1bac2>20)
            {
                test_notes=false;
            }
        }
        if(s2bac2!="")
        {
            if(!parseFloat(s2bac2) || s2bac2<0 || s2bac2>20)
            {
                test_notes=false;
            }
        }
        if(annuellebac2!="")
        {
            if(!parseFloat(annuellebac2) || annuellebac2<0 || annuellebac2>20)
            {
                test_notes=false;
            }
        }
        if(notenational!="")
        {
            if(!parseFloat(notenational) || notenational<0 || notenational>20)
            {
                test_notes=false;
            }
        }
        if(notegenerale!="")
        {
            if(!parseFloat(notegenerale) || notegenerale<0 || notegenerale>20)
            {
                test_notes=false;
            }
        }*/
        //if(inscrit==1) {$('#statutcontact').find('option:ntch-child(2)').attr('selected', true); statutcontact  = $('#statutcontact').val();}
        if ( nom != "" && prenom != "" && test_notes ) {
            if(depotdossier==1)
            {
                if(datedpotdossier=="")
                {
                    alert("erreur1");
                    valiadeform=false;
                    return valiadeform;
                }
                else
                {
                numerodossier = $('#numerodossier').val();
                $('#statutcontact').val('Candidat');
                }
            }
            if(datedpotdossier!="")
            {
                if(depotdossier==0)
                {
                    alert("erreur2");
                    valiadeform=false;
                    return valiadeform;
                }
                 else
                {
                numerodossier = $('#numerodossier').val();
                $('#statutcontact').val('Candidat');
                }
            }
            if(fraisdossier==1)
            {
                if(datefrais=="")
                {
                    alert("erreur3");
                    valiadeform=false;
                    return valiadeform;
                }
                if(depotdossier==0)
                {
                    alert("erreur4");
                    valiadeform=false;
                    return valiadeform;
                }
                if(datedpotdossier=="")
                {
                    alert("erreur5");
                    valiadeform=false;
                    return valiadeform;
                }
            }
            if(datefrais!="")
            {
                if(fraisdossier==0)
                {
                    alert("erreur6");
                    valiadeform=false;
                    return valiadeform;
                }
                if(depotdossier==0)
                {
                    alert("erreur7");
                    valiadeform=false;
                    return valiadeform;
                }
                if(datedpotdossier=="")
                {
                    alert("erreur8");
                    valiadeform=false;
                    return valiadeform;
                }
            }
            if (inscrit == 1) {
                statutcontact = $('#statutcontact').val();
            }
            if(pieces==1 && datepieces=="")
            {
                alert('Merci de remplir la date de pieces avant de cocher pieces');
                valiadeform=false;
                return false;
            }
            if(pieces==0 && datepieces!="")
            {
                alert('Merci de cocher  pieces avant de remplir le champ date pieces');
                valiadeform=false;
                return false;
            }
            if(test!="" && datetest=="")
            {
                alert('Merci de remplir la date de test avant de choisir le Test');
                valiadeform=false;
                return false;
            
            }
         
            if(valiadeform)
            {
            	statutcontact = $('#statutcontact').val();
                $.ajax({
                    method: "POST",
                    data: {
                        "civilite": civilite,
                        "depotdossier": depotdossier,
                        "datefrais": datefrais,
                        "datepieces": datepieces,
                        "pieces": pieces,
                        "resultat": resultat,
                        "observationsresultat": observationsresultat,
                        "abstest": absetest,
                        "testpasse": testpasse,
                        "stautcontact": statutcontact,
                        "envoiconvocation": envoiconvocation,
                        "nom": nom,
                        "fraisdossier": fraisdossier,
                        "inscrit": inscrit,
                        "contactsuivipar":contactsuivipar,
                        "inscriptionrecupar": inscriptionrecupar,
                        "etatdossier": etatdossier,
                        "pays": pays,
                        "dateinscription":dateinscription,
                        "prenom": prenom,
                        "datenaissance": datenaissance,
                        "lieunaissance": lieunaissance,
                        "datedepotdossier": datedpotdossier,
                        "email": email,
                        "gsm": gsm,
                        "datecontact": datecontact,
                        "nationalite": nationalite,
                        "telephone": telephone,
                        "ville": ville,
                        "adresse": adresse,
                        "nomprenommere": nomprenommere,
                        "nomprenompere": nomprenompere,
                        "professionpere": professionpere,
                        "professionmere": professionmere,
                        "telmere": telmere,
                        "telpere": telpere,
                        "mailpere": mailpere,
                        "mailmere": mailmere,
                        "adresseparents": adresseparents,
                        "niveauetudes": niveaueudes,
                        "diplomesobtenus": diplomesobtenues,
                        "numerodossier": numerodossier,
                        "anneeobtention": anneeobtention,
                        "seriebac": seriebac,
                        "etablissement": etablissement,
                        "natureconatct": naturecontact,
                        "resident": resident,
                        "typeresidence": typeresidence,
                        "formationdemande": formationdemande,
                        "niveaudemande": niveaudemande,
                        "recupar": recupar,
                        "observations": obseravtions,
                        "langue1": langue1,
                        "langue2": langue2,
                        "langue3": langue3,
                        "visite": visite,
                        "lyceepublic": lyceepublic,
                        "lyceeprive": lyceeprive,
                        "lyceemission": lyceemission,
                        "contacsuitea": contactsuitea,
                        "test": test,
                        "datetest": datetest,
                        "anneeuniv": Annuniv,
                        "marche": marche,
                        "motif": motif,
                        's1tc' : s1tc,
                        's2tc' : s2tc,
                        'annuelletc' : annuelletc,
                        's1bac1' : s1bac1,
                        's2bac1' : s2bac1,
                        'annuellebac1' : annuellebac1,
                        'noteregional' : noteregional,
                        's1bac2' : s1bac2,
                        's2bac2' : s2bac2,
                        'annuellebac2' : annuellebac2,
                        'notenational' : notenational,
                        'notegenerale' : notegenerale
                    },
                    success: function (data) {
                        $('#etatmodif').html('Modifcation avec sucess');
                        $('#etatmodif').fadeIn(1000);
                        $('#etatmodif').fadeOut(1000);
                        document.body.scrollTop = document.documentElement.scrollTop = 0;
                    }
                });
            }

        }
        else {
        if (nom == "") {
            $('#nom').focus();
            $('#nom').css("border-color","#F44336");
            setTimeout(function(){ $('#nom').css("border-color","#d2d6de");  }, 700);
              valiadeform=false;
        }  else if (prenom == "") {
            $('#prenom').focus();
            $('#prenom').css("border-color","#F44336");
            setTimeout(function(){ $('#prenom').css("border-color","#d2d6de");  }, 700);
              valiadeform=false;
        }
        else if (email == "") {
            $("#mail").focus();
            $('#mail').css("border-color","#F44336");
            setTimeout(function(){ $('#mail').css("border-color","#d2d6de");  }, 700);
            valiadeform=false;
        }
        else if(telephone == "" && gsm==""){
            if (telephone == "")
            {
            $("#telephone").focus();
            $('#telephone').css("border-color","#F44336");
            setTimeout(function(){ $('#telephone').css("border-color","#d2d6de");  }, 700);
            valiadeform=false;
            }
            else  if (gsm == "")
            {
                $("#telephone").focus();
                $('#telephone').css("border-color","#F44336");
                setTimeout(function(){ $('#telephone').css("border-color","#d2d6de");  }, 700);
                valiadeform=false;
            }
        }
            $('#erreur').html('Des Champs sont obligatoires');
            $('#erreur').fadeIn(1000);
            $('#erreur').fadeOut(1000);
            setTimeout(function(){ document.body.scrollTop = document.documentElement.scrollTop = 0;  }, 700);
            
            return false;
        }
    }
    else if(type=='I')
    {
        var civilite = $('#civilite').val();
         var date= $('#date').val();
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var lieunaissance = $('#lieunaissance').val();
        var email = $('#email').val();
        var datenaissance = $('#datenaissance').val();
        var gsm = $('#gsm').val();
        var telephone = $('#tel').val();
        var ville = $('#ville').val();
        var datecontact = $('#date').val();
        var adresse = $('#adresse').val();
        var professionpere = $('#professeionpere').val();
        var professionmere = $('#professeionmere').val();
        var telmere = $('#telmere').val();
        var telpere = $('#telpere').val();
        var mailpere = $('#mailpere').val();
        var mailmere = $('#mailmere').val();
        var niveaueudes = $('#niveauetudes').val();
        var diplomesobtenues = $('#diplomeobtenu').val();
        var anneeobtention = $('#anneeobtention').val();
        var seriebac = $('#branche').val();
        var etablissement = $('#lycee').val();
        var experiencepro = $('#experienceprof').val();
        var formationdemande = $('#formationdemandee').val();
        var recupar = $('#recupar').val();
        var obseravtions = $('#observations').val();
        var lyceepublic = $('#teyp1').is(':checked');
        var lyceeprive = $('#type2').is(':checked');
        var lyceemission = $('#type3').is(':checked');
        if (lyceemission) lyceemission = 1; else lyceemission = 0;
        if (lyceeprive) lyceeprive = 1; else lyceeprive = 0;
        if (lyceepublic) lyceepublic = 1; else lyceepublic = 0;
        var marche = $('#marche').val();
        var Annuniv = $('#anneeuniver').val();
        var groupeformation = $('#groupe_foramation').val();
        var anneetude = $('#anneeetude').val();
        var categorie =  $('#categorie').val();
        var naturecontact = $('#naturecontact').val();
        var cp = $('#cp').val();
        var villelyceee= $('#ville_lycee').val();
        var interessepar = $('#interessepar').val();
        var lycee = $('#lycee').val();
        var s1tc=$("#s1tc").val();
        var s2tc=$("#s2tc").val();
        var annuelletc=$("#annuelletc").val();
        var s1bac1=$("#s1bac1").val();
        var s2bac1=$("#s2bac1").val();
        var annuellebac1=$("#annuellebac1").val();
        var noteregional=$("#noteregional").val();
        var s1bac2=$("#s1bac2").val();
        var s2bac2=$("#s2bac2").val();
        var annuellebac2=$("#annuellebac2").val();
        var notenational=$("#notenational").val();
        var notegenerale=$("#notegenerale").val();
        test_notes=true;
        if(s1tc!="")
        {
            if(!parseFloat(s1tc) || s1tc<0 || s1tc>20)
            {
                test_notes=false;
            }
        }
        if(s2tc!="")
        {
            if(!parseFloat(s2tc) || s2tc<0 || s2tc>20)
            {
                test_notes=false;
            }
        }
        if(annuelletc!="")
        {
            if(!parseFloat(annuelletc) || annuelletc<0 || annuelletc>20)
            {
                test_notes=false;
            }
        }
        if(s1bac1!="")
        {
            if(!parseFloat(s1bac1) || s1bac1<0 || s1bac1>20)
            {
                test_notes=false;
            }
        }
        if(s2bac1!="")
        {
            if(!parseFloat(s2bac1) || s2bac1<0 || s2bac1>20)
            {
                test_notes=false;
            }
        }
        if(annuellebac1!="")
        {
            if(!parseFloat(annuellebac1) || annuellebac1<0 || annuellebac1>20)
            {
                test_notes=false;
            }
        }
        if(noteregional!="")
        {
            if(!parseFloat(noteregional) || noteregional<0 || noteregional>20)
            {
                test_notes=false;
            }
        }
        if(s1bac2!="")
        {
            if(!parseFloat(s1bac2) || s1bac2<0 || s1bac2>20)
            {
                test_notes=false;
            }
        }
        if(s2bac2!="")
        {
            if(!parseFloat(s2bac2) || s2bac2<0 || s2bac2>20)
            {
                test_notes=false;
            }
        }
        if(annuellebac2!="")
        {
            if(!parseFloat(annuellebac2) || annuellebac2<0 || annuellebac2>20)
            {
                test_notes=false;
            }
        }
        if(notenational!="")
        {
            if(!parseFloat(notenational) || notenational<0 || notenational>20)
            {
                test_notes=false;
            }
        }
        if(notegenerale!="")
        {
            if(!parseFloat(notegenerale) || notegenerale<0 || notegenerale>20)
            {
                test_notes=false;
            }
        }
        if(test_notes)
        {
        $.ajax({
            method: "POST",
            data: {
                "civilite": civilite,
                "date": date,
                "interessepar":interessepar,
                "nom": nom,
                "groupe_foramation":groupeformation,
                "prenom": prenom,
                "anneeetude":anneetude,
                "datenaissance": datenaissance,
                "lieunaissance": lieunaissance,
                "email": email,
                "categorie":categorie,
                "gsm": gsm,
                "datecontact": datecontact,
                "telephone": telephone,
                "ville": ville,
                "experprof":experiencepro,
                "branche":seriebac,
                "cp":cp,
                "villelycee":villelyceee,
                "adresse": adresse,
                "professionpere": professionpere,
                "professionmere": professionmere,
                "telmere": telmere,
                "telpere": telpere,
                "mailpere": mailpere,
                "mailmere": mailmere,
                "niveauetudes": niveaueudes,
                "diplomesobtenus": diplomesobtenues,
                "anneeobtention": anneeobtention,
                "seriebac": seriebac,
                "etablissement": etablissement,
                "natureconatct": naturecontact,
                "formationdemande": formationdemande,
                "recupar": recupar,
                "observations": obseravtions,
                "lyceepublic": lyceepublic,
                "lyceeprive": lyceeprive,
                "lyceemission": lyceemission,
                "anneeuniv": Annuniv,
                "marche": marche,
                "lycee":lycee,
                 's1tc' : s1tc,
                's2tc' : s2tc,
                'annuelletc' : annuelletc,
                's1bac1' : s1bac1,
                's2bac1' : s2bac1,
                'annuellebac1' : annuellebac1,
                'noteregional' : noteregional,
                's1bac2' : s1bac2,
                's2bac2' : s2bac2,
                'annuellebac2' : annuellebac2,
                'notenational' : notenational,
                'notegenerale' : notegenerale
            },
            success: function (data) {
                $('#etatmodif').html('Modifcation avec sucess');
                $('#etatmodif').fadeIn(1000);
                $('#etatmodif').fadeOut(1000);
                document.body.scrollTop = document.documentElement.scrollTop = 0;
            }
        });
        }
        else
        {
         alert("Merci de vérifier les Notes !");
        }
    }
    else  {
        $('#erreur').html('Des Champs sont obligatoires');
        $('#erreur').fadeIn(1000);
        $('#erreur').fadeOut(1000);
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    }

}
$('#ajouterville').click(function(){
    if($('#nomville').val()!="" && $('#nomville').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomville="+$('#nomville').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});



$('#ajouterphoning').click(function(){
    if($('#nometatphoning').val()!="" && $('#nometatphoning').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nometatphoning="+$('#nometatphoning').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});





$('#ajouteraction').click(function(){
    if($('#nomaction').val()!="" && $('#nomaction').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomaction="+$('#nomaction').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});



$('#ajoutercontactsuitea').click(function(){
    if($('#contactsuitea').val()!="" && $('#contactsuitea').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"contactsuitea="+$('#contactsuitea').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});




$('#ajoutertest').click(function(){
    if($('#nomtest').val()!="" && $('#nomtest').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomtest="+$('#nomtest').val(),
                success:function(data)
                {
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});

$('#ajoutertyperesidence').click(function(){
    if($('#nomtyperesidence').val()!="" && $('#nomtyperesidence').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomtyperesidence="+$('#nomtyperesidence').val(),
                success:function(data)
                {
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajoutermotif').click(function(){
    if($('#nommotif').val()!="" && $('#nommotif').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nommotif="+$('#nommotif').val(),
                success:function(data)
                {
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajouteretat').click(function(){
    if($('#nometat').val()!="" && $('#nometat').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nometat="+$('#nometat').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajouterpays').click(function(){
    if($('#nompays').val()!="" && $('#nompays').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nompays="+$('#nompays').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajouterlangue').click(function(){
    if($('#nomlangue').val()!="" && $('#nomlangue').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomlangue="+$('#nomlangue').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajouterformation').click(function(){
    if($('#nomformation').val()!="" && $('#nomformation').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomformation="+$('#nomformation').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajoutercampagne').click(function(){
    if($('#nomcapagne').val()!="" && $('#nomcapagne').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomcapagne="+$('#nomcapagne').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajoutergroupe').click(function(){
    if($('#nomgroupe').val()!="" && $('#nomgroupe').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomgroupe="+$('#nomgroupe').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajouterdiplome').click(function(){
    if($('#nomdiplome').val()!="" && $('#nomdiplome').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomdiplome="+$('#nomdiplome').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});
$('#ajouterserie').click(function(){
    if($('#nomserie').val()!="" && $('#nomserie').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomserie="+$('#nomserie').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});




$('#ajoutermarche').click(function(){
    if($('#nommarche').val()!="" && $('#nommarche').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nommarche="+$('#nommarche').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});


$('#ajouteretablisseet').click(function(){
    if($('#nometablissement').val()!="" && $('#nometablissement').val()!='')
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nometablissement="+$('#nometablissement').val(),
                success:function(data)
                {
                $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});



$("#ajouterresultat").click(function(){
    if($("#nomresultat").val()!="")
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomresultat="+$("#nomresultat").val(),
                success:function(data)
                {
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        );
    }
}); 


$("#ajouternature").click(function()
{
    if($("#nomnature").val()!="" )
    {
        $.ajax({
                url:"content/controller/scriptajout.php",
                method:"POST",
                data:"nomnature="+$('#nomnature').val(),
                success:function(data)
                {
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#etatajout').html(data);
                    $('#etatajout').fadeIn(1000);
                    $('#etatajout').fadeOut(1000);
                }
            }
        )
    }
});

$('#submitsupercommercial').click(function(){
    var civilite = $('#civilite').val();
    var nom = $('#nom').val();
    mytest=true;
    var contactsuivipar = $('#suivipar').val();
    var prenom = $('#prenom').val();
    var lieunaissance = $('#lieunaissance').val();
    var email = $('#mail').val();
    var datenaissance =$('#datenaissance').val();
    var gsm = $('#gsm').val();
    var nationalite = $('#nationalite').val();
    var telephone = $('#telephone').val();
    var ville = $('#ville').val();
    var datecontact = $('#datecontact').val();
    var adresse = $('#adresse').val();
    var nomprenommere = $('#nomprenommere').val();
    var nomprenompere = $('#nomprenompere').val();
    var professionpere = $('#professpere').val();
    var professionmere = $('#professmere').val();
    var telmere = $('#telmere').val();
    var telpere = $('#telpere').val();
    
    var mailpere = $('#mailpere').val();
    var mailmere = $('#mailmere').val();
    var adresseparents = $('#adresseparents').val();
    var niveaueudes = $('#niveauetudes').val();
    var diplomesobtenues = $('#diplomeobt').val();
    var anneeobtention = $('#anneeobtention').val();
    var seriebac = $('#seriebac').val();
    var etablissement = $('#etablissement').val();
    var naturecontact = $('#naturecontact').val();
    var formationdemande = $('#formationdemandee').val();
    var niveaudemande = $('#niveaudemande').val();
    var recupar = $('#recupar').val();
    var obseravtions= $('#observations').val();
    var contactsuitea = $('#contactsuitea').val();
                    $.ajax({
                        method:"POST",
                        data: {
                            "civilite": civilite,
                            "nom": nom,
                            "prenom": prenom,
                            "datecontact":datecontact,
                            "datenaissance": datenaissance,
                            "lieunaissance": lieunaissance,
                            "email": email,
                            "gsm": gsm,
                            "datecontact":datecontact,
                            "nationalite": nationalite,
                            "telephone": telephone,
                            "ville": ville,
                            "contactsuivipar":contactsuivipar,
                            "adresse": adresse,
                            "nomprenommere": nomprenommere,
                            "nomprenompere": nomprenompere,
                            "professionpere": professionpere,
                            "professionmere": professionmere,
                            "telmere": telmere,
                            "telpere": telpere,
                            "mailpere": mailpere,
                            "mailmere": mailmere,
                            "adresseparents": adresseparents,
                            "niveauetudes": niveaueudes,
                            "diplomesobtenus": diplomesobtenues,
                            "anneeobtention": anneeobtention,
                            "seriebac": seriebac,
                            "etablissement": etablissement,
                            "natureconatct": naturecontact,
                            "formationdemande": formationdemande,
                            "niveaudemande": niveaudemande,
                            "recupar": recupar,
                            "observations": obseravtions,
                            "contacsuitea":contactsuitea

                        },
                        success:function(data)
                        {
                            if(data=='1')
                            {
                                window.scrollTo(0,0);
                                $('#etatajout').html('Contact Ajouté avec succces');
                                $('#etatajout').fadeIn(500);
                                $('#etatajout').fadeOut(1000);
                            }
                        }
                    });
               
    });








$('#submit').click(function(){
    var civilite = $('#civilite').val();
    var nom = $('#nom').val();
    mytest=true;
    var prenom = $('#prenom').val();
    var lieunaissance = $('#lieunaissance').val();
    var email = $('#mail').val();
    var datenaissance =$('#datenaissance').val();
    var gsm = $('#gsm').val();
    var nationalite = $('#nationalite').val();
    var telephone = $('#telephone').val();
    var ville = $('#ville').val();
    var datecontact = $('#datecontact').val();
    var adresse = $('#adresse').val();
    var nomprenommere = $('#nomprenommere').val();
    var nomprenompere = $('#nomprenompere').val();
    var professionpere = $('#professpere').val();
    var professionmere = $('#professmere').val();
    var telmere = $('#telmere').val();
    var telpere = $('#telpere').val();
    
    var mailpere = $('#mailpere').val();
    var mailmere = $('#mailmere').val();
    var adresseparents = $('#adresseparents').val();
    var niveaueudes = $('#niveauetudes').val();
    var diplomesobtenues = $('#diplomeobt').val();
    var anneeobtention = $('#anneeobtention').val();
    var seriebac = $('#seriebac').val();
    var etablissement = $('#etablissement').val();
    var naturecontact = $('#naturecontact').val();
    var resident = $('#resident').is(':checked');
    if(resident) resident=1;else resident=0;
    var typeresidence = $('#typeresidence').val();
    var etatdossier  = $('#etatdossier').val();
    var formationdemande = $('#formationdemandee').val();
    var niveaudemande = $('#niveaudemande').val();
    var recupar = $('#recupar').val();
    var obseravtions= $('#observations').val();
    var langue1 = $('#langue1').val();
    var langue2 = $('#langue2').val();
    var langue3 = $('#langue3').val();
    var visite = $('#visite').is(':checked');
    var lyceepublic = $('#lyceepublic').is(':checked');
    var lyceeprive = $('#lyceeprive').is(':checked');
    var lyceemission = $('#lyceemission').is(':checked');
    var contactsuitea = $('#contactsuitea').val();
    var test=$('#test').val();
    var datetest=$('#datetest').val();
    if(visite) visite=1;else visite=0;
    if(lyceemission) lyceemission=1;else lyceemission=0;
    if(lyceeprive) lyceeprive=1;else lyceeprive=0;
    if(lyceepublic) lyceepublic=1;else lyceepublic=0;
    var marche = $('#marche').val();
    var anneeuniver = $('#anneeuniv').val();
    if(civilite!="" && naturecontact!="" && datecontact!="" && niveaudemande!="" && formationdemande!="" && nom!="" && prenom
        !="" && nationalite!="" && isValidEmailAddress(email) && telephone!=""&& ville!="" && recupar!="" && etablissement!="" && contactsuitea!="")
    {
        
        if(mailmere!="" && !isValidEmailAddress(mailmere))
        {
            alert('mail mere non valide');
            mytest=false;
            $("#mailmere").focus();
            $(".erreur").fadeIn(1000);
            $(".erreur").fadeOut(1000);
            return false;
        }
        if(mailpere!="" && !isValidEmailAddress(mailpere))
        {
             alert('mail pere non valide');
            mytest=false;
            $("#mailpere").focus();
            $(".erreur").fadeIn(1000);
            $(".erreur").fadeOut(1000);
            return false;
        }
        mytest=true;
    }else {
        mytest=false;
        if (naturecontact == "") {
            $("#naturecontact").focus();
            $('#naturecontact+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#naturecontact+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if(datecontact=="")
        {
            $('#datecontact').focus();
            $('#datecontact').css("border-color","#F44336");
            setTimeout(function(){ $('#datecontact').css("border-color","#d2d6de");  }, 700);
        }
        else  if (formationdemande == "") {
            $('#formationdemandee').focus();
            $('#formationdemandee+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#formationdemandee+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if(contactsuitea=="")
        {
            $('#contactsuitea').focus();
            $('#contactsuitea+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#contactsuitea+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if (niveaudemande == "") {
            $('#niveaudemande').focus();
            $('#niveaudemande+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#niveaudemande+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if (recupar == "") {
            $('#recupar').focus();
            $('#recupar+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#recupar+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else  if (civilite == "") {
            $('#civilite').focus();
            $('#civilite').css("border-color","#F44336");
            setTimeout(function(){ $('#civilite').css("border-color","#d2d6de");  }, 700);
        }
        else if (nom == "") {
            $('#nom').focus();
            $('#nom').css("border-color","#F44336");
            setTimeout(function(){ $('#nom').css("border-color","#d2d6de");  }, 700);
            
        }  else if (prenom == "") {
            $('#prenom').focus();
            $('#prenom').css("border-color","#F44336");
            setTimeout(function(){ $('#prenom').css("border-color","#d2d6de");  }, 700);
        }
        else if (email == "") {
            $("#mail").focus();
            $('#mail').css("border-color","#F44336");
            setTimeout(function(){ $('#mail').css("border-color","#d2d6de");  }, 700);
        }
        else  if (telephone == "") {
            $("#telephone").focus();
            $('#telephone').css("border-color","#F44336");
            setTimeout(function(){ $('#telephone').css("border-color","#d2d6de");  }, 700);
        }
        else if (nationalite == "") {
            $("#nationalite").focus();
            $('#nationalite+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#nationalite+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else  if (ville == "") {
            $("#ville").focus();
            $('#ville+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#ville+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else  if(etablissement=="")
        {
            $('#etablissement').focus();
            $('#etablissement+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#etablissement+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }

        else  if(email=="")
        {
            $('#email').focus();
            $('#email').css("border-color","#F44336");
            setTimeout(function(){ $('#email').css("border-color","#d2d6de");  }, 700);
        }
        $(".erreur").fadeIn(1000);
        $(".erreur").fadeOut(1000);
        return false;
    }
    $.ajax({
        type:'POST',
        data:{
            'nom_find' : nom,
            'prenom_find' :prenom
        },
        success:function(data)
        {
            if(data.validation==true)
            {
                window.scrollTo(0,0);
                $("#message-div").show();
                $("#message-div").html('<div class="alert alert-warning alert-dismissable"><a class="btn btn-warning btn-xs pull-right" style="border-color: white !important;" onclick="AddContactDirectforcer();" >Forcer la validation</a><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+data.message+'' +
                '</div>');
                return false;
            }
            else
            {
                if(mytest)
                {
                    $.ajax({
                        method:"POST",
                        data: {
                            "civilite": civilite,
                            "nom": nom,
                            "prenom": prenom,
                            "datecontact":datecontact,
                            "datenaissance": datenaissance,
                            "lieunaissance": lieunaissance,
                            "email": email,
                            "gsm": gsm,
                            "datecontact":datecontact,
                            "nationalite": nationalite,
                            "telephone": telephone,
                            "ville": ville,
                            "adresse": adresse,
                            "nomprenommere": nomprenommere,
                            "nomprenompere": nomprenompere,
                            "professionpere": professionpere,
                            "professionmere": professionmere,
                            "telmere": telmere,
                            "telpere": telpere,
                            "mailpere": mailpere,
                            "mailmere": mailmere,
                            "adresseparents": adresseparents,
                            "niveauetudes": niveaueudes,
                            "diplomesobtenus": diplomesobtenues,
                            "anneeobtention": anneeobtention,
                            "seriebac": seriebac,
                            "etablissement": etablissement,
                            "natureconatct": naturecontact,
                            "resident": resident,
                            "typeresidence": typeresidence,
                            "etatdossier": etatdossier,
                            "formationdemande": formationdemande,
                            "niveaudemande": niveaudemande,
                            "recupar": recupar,
                            "observations": obseravtions,
                            "langue1": langue1,
                            "langue2": langue2,
                            "langue3": langue3,
                            "visite": visite,
                            "lyceepublic":lyceepublic,
                            "lyceeprive":lyceeprive,
                            "lyceemission":lyceemission,
                            "contacsuitea":contactsuitea,
                            "test":test,
                            "datetest":datecontact,
                            "anneeuniv":anneeuniver,
                            "marche":marche

                        },
                        success:function(data)
                        {
                            if(data=='1')
                            {
                                window.scrollTo(0,0);
                                $('#etatajout').html('Contact Ajouté avec succces');
                                $('#etatajout').fadeIn(500);
                                $('#etatajout').fadeOut(1000);
                            }
                            else
                            {
                                $(".erreur").fadeIn(500);
                                $(".erreur").fadeOut(1000);
                            }
                        }
                    });
                }
            }
        }
    });



});







function AddContactDirectforcer(){
    var civilite = $('#civilite').val();
    var nom = $('#nom').val();
    mytest=true;
    var prenom = $('#prenom').val();
    var lieunaissance = $('#lieunaissance').val();
    var email = $('#mail').val();
    var datenaissance =$('#datenaissance').val();
    var gsm = $('#gsm').val();
    var nationalite = $('#nationalite').val();
    var telephone = $('#telephone').val();
    var ville = $('#ville').val();
    var datecontact = $('#datecontact').val();
    var adresse = $('#adresse').val();
    var nomprenommere = $('#nomprenommere').val();
    var nomprenompere = $('#nomprenompere').val();
    var professionpere = $('#professpere').val();
    var professionmere = $('#professmere').val();
    var telmere = $('#telmere').val();
    var telpere = $('#telpere').val();
    var mailpere = $('#mailpere').val();
    var mailmere = $('#mailmere').val();
    var adresseparents = $('#adresseparents').val();
    var niveaueudes = $('#niveauetudes').val();
    var diplomesobtenues = $('#diplomeobt').val();
    var anneeobtention = $('#anneeobtention').val();
    var seriebac = $('#seriebac').val();
    var etablissement = $('#etablissement').val();
    var naturecontact = $('#naturecontact').val();
    var resident = $('#resident').is(':checked');
    if(resident) resident=1;else resident=0;
    var typeresidence = $('#typeresidence').val();
    var etatdossier  = $('#etatdossier').val();
    var formationdemande = $('#formationdemandee').val();
    var niveaudemande = $('#niveaudemande').val();
    var recupar = $('#recupar').val();
    var obseravtions= $('#observations').val();
    var langue1 = $('#langue1').val();
    var langue2 = $('#langue2').val();
    var langue3 = $('#langue3').val();
    var visite = $('#visite').is(':checked');
    var lyceepublic = $('#lyceepublic').is(':checked');
    var lyceeprive = $('#lyceeprive').is(':checked');
    var lyceemission = $('#lyceemission').is(':checked');
    var contactsuitea = $('#contactsuitea').val();
    var test=$('#test').val();
    var datetest=$('#datetest').val();
    if(visite) visite=1;else visite=0;
    if(lyceemission) lyceemission=1;else lyceemission=0;
    if(lyceeprive) lyceeprive=1;else lyceeprive=0;
    if(lyceepublic) lyceepublic=1;else lyceepublic=0;
    var marche = $('#marche').val();
    var anneeuniver = $('#anneeuniv').val();
    if(civilite!="" && naturecontact!="" && datecontact!="" && niveaudemande!="" && formationdemande!="" && nom!="" && prenom
        !="" && nationalite!="" && isValidEmailAddress(email) && telephone!=""&& ville!="" && recupar!="" && etablissement!="" && contactsuitea!="")
    {
        if(mailmere!="" && !isValidEmailAddress(mailmere))
        {
            mytest=false;
            $("#mailmere").focus();
            $(".erreur").fadeIn(1000);
            $(".erreur").fadeOut(1000);
            return false;
        }
        if(mailpere!="" && !isValidEmailAddress(mailpere))
        {
            mytest=false;
            $("#mailpere").focus();
            $(".erreur").fadeIn(1000);
            $(".erreur").fadeOut(1000);
            return false;
        }
        mytest=true;
    }else {
        mytest=false;
        if (naturecontact == "") {
            $("#naturecontact").focus();
            $('#naturecontact+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#naturecontact+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if(datecontact=="")
        {
            $('#datecontact').focus();
            $('#datecontact').css("border-color","#F44336");
            setTimeout(function(){ $('#datecontact').css("border-color","#d2d6de");  }, 700);
        }
        else  if (formationdemande == "") {
            $('#formationdemandee').focus();
            $('#formationdemandee+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#formationdemandee+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if(contactsuitea=="")
        {
            $('#contactsuitea').focus();
            $('#contactsuitea+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#contactsuitea+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if (niveaudemande == "") {
            $('#niveaudemande').focus();
            $('#niveaudemande+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#niveaudemande+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else if (recupar == "") {
            $('#recupar').focus();
            $('#recupar+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#recupar+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else  if (civilite == "") {
            $('#civilite').focus();
            $('#civilite').css("border-color","#F44336");
            setTimeout(function(){ $('#civilite').css("border-color","#d2d6de");  }, 700);
        }
        else if (nom == "") {
            $('#nom').focus();
            $('#nom').css("border-color","#F44336");
            setTimeout(function(){ $('#nom').css("border-color","#d2d6de");  }, 700);
        }  else if (prenom == "") {
            $('#prenom').focus();
            $('#prenom').css("border-color","#F44336");
            setTimeout(function(){ $('#prenom').css("border-color","#d2d6de");  }, 700);
        }
        else if (email == "") {
            $("#mail").focus();
            $('#mail').css("border-color","#F44336");
            setTimeout(function(){ $('#mail').css("border-color","#d2d6de");  }, 700);
        }
        else  if (telephone == "") {
            $("#telephone").focus();
            $('#telephone').css("border-color","#F44336");
            setTimeout(function(){ $('#telephone').css("border-color","#d2d6de");  }, 700);
        }
        else if (nationalite == "") {
            $("#nationalite").focus();
            $('#nationalite+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#nationalite+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else  if (ville == "") {
            $("#ville").focus();
            $('#ville+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#ville+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }
        else  if(etablissement=="")
        {
            $('#etablissement').focus();
            $('#etablissement+ span > .selection > span').css("border-color","#F44336");
            setTimeout(function(){ $('#etablissement+ span > .selection > span').css("border-color","#d2d6de");  }, 700);
        }

        else  if(email=="")
        {
            $('#email').focus();
            $('#email').css("border-color","#F44336");
            setTimeout(function(){ $('#email').css("border-color","#d2d6de");  }, 700);
        }
        $(".erreur").fadeIn(1000);
        $(".erreur").fadeOut(1000);
        return false;
    }
    $.ajax({
        type:'POST',
        data:{
            'nom_find' : nom,
            'prenom_find' :prenom
        },
        success:function(data)
        {
                if(mytest)
                {
                    $.ajax({
                        method:"POST",
                        data: {
                            "civilite": civilite,
                            "nom": nom,
                            "prenom": prenom,
                            "datecontact":datecontact,
                            "datenaissance": datenaissance,
                            "lieunaissance": lieunaissance,
                            "email": email,
                            "gsm": gsm,
                            "datecontact":datecontact,
                            "nationalite": nationalite,
                            "telephone": telephone,
                            "ville": ville,
                            "adresse": adresse,
                            "nomprenommere": nomprenommere,
                            "nomprenompere": nomprenompere,
                            "professionpere": professionpere,
                            "professionmere": professionmere,
                            "telmere": telmere,
                            "telpere": telpere,
                            "mailpere": mailpere,
                            "mailmere": mailmere,
                            "adresseparents": adresseparents,
                            "niveauetudes": niveaueudes,
                            "diplomesobtenus": diplomesobtenues,
                            "anneeobtention": anneeobtention,
                            "seriebac": seriebac,
                            "etablissement": etablissement,
                            "natureconatct": naturecontact,
                            "resident": resident,
                            "typeresidence": typeresidence,
                            "etatdossier": etatdossier,
                            "formationdemande": formationdemande,
                            "niveaudemande": niveaudemande,
                            "recupar": recupar,
                            "observations": obseravtions,
                            "langue1": langue1,
                            "langue2": langue2,
                            "langue3": langue3,
                            "visite": visite,
                            "lyceepublic":lyceepublic,
                            "lyceeprive":lyceeprive,
                            "lyceemission":lyceemission,
                            "contacsuitea":contactsuitea,
                            "test":test,
                            "datetest":datecontact,


                            "anneeuniv":anneeuniver,
                            "marche":marche

                        },
                        success:function(data)
                        {
                            if(data=='oui')
                            {
                                window.scrollTo(0,0);
                                $('#etatajout').html('Contact Ajouté avec succces');
                                $('#etatajout').fadeIn(500);
                                $('#etatajout').fadeOut(1000);
                            }
                            else
                            {
                                $(".erreur").fadeIn(500);
                                $(".erreur").fadeOut(1000);
                            }
                        }
                    });
                }
        }
    });
}