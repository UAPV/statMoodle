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

        /*xAxis: {
            categories: categories,
            tickmarkPlacement: 'on',
            lineWidth: 0
        },*/

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
            tickInterval: 25
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

function getLineChart(idContainer, titre, data )
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

    console.log(donnees);
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

function getMultipleLineChart(idContainer, titre, data )
{
    data = explodeJson(data);
    categories = new Array();
    donnees = new Array();
    tmp = new Array();

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
            categories: categories,
            min: 0
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
        series:

           donnees

    });
}

function getStackedBarChart(idContainer,data,url)
{
    series = new Array();
    categories = new Array();
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