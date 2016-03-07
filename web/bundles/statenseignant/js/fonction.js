/**
 * Récupère un object JSON et le transforme en tableau
 * clé <-> valeur
 * @param data
 * @returns {Array}
 */
function explodeJson(data)
{
    var tab = {};
    data = $.parseJSON(data);
    $.each(data, function (i,v)
    {
      tab[i] = v;
    })

    return tab;
}

<<<<<<< HEAD
=======
function getGraph(type, id, titre, data, max, debut, fin)
{
    switch (type) {
        case "spider":
            return this.getSpiderWeb(id, titre, data, max);
            break;
        case "bar":
            return this.getColumnOrBar(id, titre, data, 'bar', max);
            break;
        case "column":
            return this.getColumnOrBar(id, titre, data, 'column', max);
            break;
        case "line":
            return this.getLineChart(id, titre, data, max);
            break;
        case "multipleLine":
            return this.getMultipleLineChart(id, titre, data, max,debut, fin);
            break;
    }
}

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
/**
 * Affiche un graphe en colonne ou en barre dans le container idContainer
 * avec pour titre titre et comme données data
 * @param idContainer
 * @param titre
 * @param data
 * @param type (column ou bar)
 */
function getColumnOrBar(idContainer, titre, data, type, max)
{
    data = explodeJson(data);
    categories = new Array();
    donnees = new Array();
    tmp = new Array();

    jQuery.each(data, function(index, value)
    {
        var myObject = new Object();

        if(parseInt(value) > max)
            myObject.y = parseInt(max);
        else
            myObject.y = parseInt(value);

        myObject.name = index;

        categories.push(index);
        donnees.push(myObject);
    })

    $('#'+idContainer).highcharts({

        chart: {
            height: 200,
            width: 600,
            spacingTop: 20,
            type: type
        },

        credits: {
            enabled: false
        },

        title: {
            text: titre,
            margin: 30
        },

        pane: {
            size: '100%'
        },
<<<<<<< HEAD

        /*xAxis: {
            categories: categories,
            tickmarkPlacement: 'on',
            lineWidth: 0
        },*/

=======
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        yAxis: {
            lineWidth: 0,
            min: 0,
            title: {
                text: 'Nb'
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: titre,
            data: donnees,
            pointPlacement: 'on'
        }]
    });
}

/**
 * Affiche un graphe radar dans le container idContainer
 * avec pour titre titre et comme données data
 * @param idContainer
 * @param titre
 * @param data
 * @param max
 */
function getSpiderWeb(idContainer, titre, data, max )
{
    data = explodeJson(data);
    categories = new Array();
    donnees = new Array();
    tmp = new Array();

    jQuery.each(data, function(index, value)
    {
      var myObject = new Object();
      myObject.name = index;

      if(parseInt(value) > max)
        myObject.y = parseInt(max);
      else
        myObject.y = parseInt(value);

      categories.push(index);
      donnees.push(myObject);
    })

    $('#'+idContainer).highcharts({

        chart: {
            polar: true,
            type: 'line',
            height: 250,
            width: 400,
            spacingTop: 20
        },

        credits: {
            enabled: false
        },

        title: {
              text: titre,
              margin: 30
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: categories,
            tickmarkPlacement: 'on',
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0,
            max: max,
<<<<<<< HEAD
            tickInterval: 25
=======
            tickInterval: 5
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        },
        legend: {
            enabled: false
        },
        series: [{
            name: titre,
            data: donnees,
            pointPlacement: 'on'
        }]
    });
}

<<<<<<< HEAD
function getLineChart(idContainer, titre, data )
=======
function getLineChart(idContainer, titre, data, max)
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
{
    data = explodeJson(data);
    categories = new Array();
    donnees = new Array();
    tmp = new Array();

    jQuery.each(data, function(index, value)
    {
        $.each(value, function(key, val) {
            var myObject = new Object();

            if(val.moy > 150)
            {
                myObject.y = 150;
                myObject.name = val.date+' (> 150)';
            }
            else
            {
                myObject.name = val.date;
                myObject.y = parseInt(val.moy);
            }

            categories.push(val.date);
            donnees.push(myObject);
        });
    })

<<<<<<< HEAD
    console.log(donnees);
=======
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    $('#'+idContainer).highcharts({

        chart: {
            height: 250,
            width: 400,
            spacingTop: 20
        },

        credits: {
            enabled: false
        },

        title: {
            text: titre,
            margin: 30
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: categories
        },

        yAxis: {
            title: {
                text: 'Nb'
            },
            min: 0
        },
        legend: {
            enabled: false
        },
        series: [{
            name: titre,
            data: donnees,
            pointPlacement: 'on'
        }]
    });
}

<<<<<<< HEAD
function getMultipleLineChart(idContainer, titre, data )
=======
function getMultipleLineChart(idContainer, titre, data, max, debut, fin)
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
{
    data = explodeJson(data);
    categories = new Array();
    donnees = new Array();
    tmp = new Array();

<<<<<<< HEAD
    jQuery.each(data, function(index, value)
    {
        for(var i=0; i<52;i++)
            categories.push(i);

        $.each(value, function(key, val) {
            var myObject = new Object();

            if(val.moy > 150)
            {
                myObject.y = 150;
                myObject.name = val.date+' (> 150)';
            }
            else
            {
                myObject.name = val.date;
                myObject.y = parseInt(val.c);
            }

            test = new Object();
            test.name = "Devoir 1";
            test.data = donnees;

            donnees.push(new Array(test));
        });
    })

    console.log(donnees);

=======
    console.log("debut : "+debut+" et fin : "+fin)
    if(parseInt(debut) < parseInt(fin))
    {
        for(var i=parseInt(debut); i<parseInt(fin);i+=5)
          categories.push(i);
    }
    else
    {
        for(var i=parseInt(debut); i<53;i+=5)
            categories.push(i);

        for(var i=1; i<parseInt(fin);i+=5)
            categories.push(i);
    }


    jQuery.each(data, function(index, value)
    {
        $.each(value, function(key, val) {
            var myObject = new Array();
            $.each(val, function(k,nb) {
              myObject.push(nb);
            });
            obj = new Object();
            obj.name = key;
            obj.data = myObject;

            donnees.push(obj);
        });
    })

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    $('#'+idContainer).highcharts({

        chart: {
            height: 250,
            width: 400,
            spacingTop: 20
        },

        credits: {
            enabled: false
        },

        title: {
            text: titre,
            margin: 30
        },

        pane: {
            size: '80%'
        },

<<<<<<< HEAD
        xAxis: {
            categories: categories,
            min: 0
        },

=======
        plotOptions: {
          series: {
              pointPlacement: null
          }
        },
        xAxis: {
            categories: categories
        },
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        yAxis: {
            title: {
                text: 'Nb'
            },
<<<<<<< HEAD
            min: 0
        },
        legend: {
            enabled: false
        },
        series:

           donnees

=======
            min: 0,
            max: max
        },
        legend: {
            enabled: true
        },
        series:
           donnees
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    });
}

function getStackedBarChart(idContainer,data,url)
{
    series = new Array();
    categories = new Array();
<<<<<<< HEAD
    data = explodeJson(data)

    $.each(data[0], function (index,value)
    {
        tmp = new Object();
        data = new Array();

        tmp.name = index;
        $.each(value['data'], function (i,v)
        {
            tag = i.replace(/\s/g, '_');

            tmp2 = new Object();
            tmp2.y = v;
            tmp2.url = url+"/"+tag;

            categories.push(i);
            data.push(tmp2);
        })
        tmp.data = data;
        series.push(tmp);
    });

=======
    donnnees = explodeJson(data);
    formatterTab = {};

    $.each(donnnees[0], function (index,value)
    {
        if(index != 'alerte')
        {
            tmp = new Object();
            data = new Array();

            tmp.name = index;
            $.each(value['data'], function (i,v)
            {
              tag = i.replace(/\s/g, '_');

              tmp2 = new Object();
              tmp2.y = v;
              tmp2.url = url+"/"+tag;

              //On récupère son alerte si il en a une
              if(donnnees[0]['alerte'] != undefined)
              {
                  var nbAlertes = donnnees[0]['alerte'].length;
                  var cptTab = new Array();
                  var cpt = 0;

                  $.each(donnnees[0]['alerte'], function (index,value){
                    var keys = new Array();
                    $.map(value['couleur'], function(element,index) { keys.push(index) })

                    if(value['data'][i] != undefined)
                    {
                        if(value['couleur'][keys[value['data'][i]]])
                        {
                            val = keys[value["data"][i]];

                            if(formatterTab[i] != undefined && cptTab[i] < nbAlertes)
                            {
                                text = '<a title="'+value['message']+'"><span class="feuAlerte" style="background: '+val+';"></span></a>';
                                tmpText = formatterTab[i];
                                formatterTab[i] = text +" "+tmpText;
                            }
                            else
                            {
                                text = '<a title="'+value['message']+'"><span class="feuAlerte" style="background: '+val+';"></span></a><span style="margin-left: 25px;">'+i+'</span>';
                                formatterTab[i] = text;
                                categories.push(i);
                                cptTab[i] = cpt+1;
                            }
                        }
                        else
                          categories.push(i);
                    }
                    else
                      categories.push(i);
                  });
              }
              data.push(tmp2);
            })

            tmp.data = data;
            series.push(tmp);
        }
    });

    categories = jQuery.unique(categories);

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    $('#'+idContainer).highcharts({
        chart: {
            height: 1200,
            type: 'bar'
        },
        title: {
            text: "Activités des étudiants"
        },
        xAxis: {
            categories: categories,
            labels: {
                style: {
                    color: '#6D869F',
                    fontSize: '9px'
<<<<<<< HEAD
=======
                },
                useHTML: true,
                x: -90,
                formatter: function () {
                    return formatterTab[this.value];
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
                }
            }
        },
        yAxis: {
            min: 0
        },
        legend: {
            backgroundColor: '#FFFFFF',
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'pointer',
                point: {
                    events: {
                        click: function() {
                            location.href = this.options.url;
                        }
                    }
                }
            }
        },
        series: series
    });
}