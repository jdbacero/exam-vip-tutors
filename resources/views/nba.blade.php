<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @csrf
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <style>
        thead input {
        width: 100%;
    }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
    
    <table id="table_id" class="display">
        <thead>
            <tr class="text-center">
                <th>Name</th>
                <th>Position</th>
                <th class="">Team</th>
                <th class="disabled">View</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr class="text-center">
                <th>Name</th>
                <th>Position</th>
                <th class="">Team</th>
                <th>View</th>
            </tr>
        </tfoot>
    </table>
    <div class="flex items-center">
        <input id="link-player" name="playerstats" type="checkbox" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="link-player" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 pr-10">Player Stats</label>
        <input id="link-team" name="team" type="checkbox" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="link-team" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300  pr-10">Team</label>.
        <input id="link-roster" name="rosterView" type="checkbox" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="link-roster" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300  pr-10">Roster</label>
        <button class="view btn border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500 download mr-10" value="csv">CSV</button>
        <button class="view btn border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500 download mr-10" value="xml">XML</button>
        <button class="view btn border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500 download mr-10" value="json">JSON</button>
    </div>


      <div id="playerprofile" class="hidden">
        <h4 class="font-bold mt-12 pb-2 border-b border-gray-200" id="playername">Player Name</h4>
        
        <div class="mt-8 grid md:grid-cols-2 gap-10">
            <!-- Content goes here -->
            <div class="card hover:shadow-xl pt-5">
                <div class="m-4">
                    <div class="font-bold mt-10" id="team">Team Name</div>
                    <span class="block text-gray-500 text-sm" id="teamname"></span>
                    <div class="font-bold">Position</div>
                    <span class="block text-gray-500 text-sm" id="pos"></span>
                    <div class="font-bold">Age</div>
                    <span class="block text-gray-500 text-sm" id="age"></span>
                    <div class="font-bold" id="teamname">Assists</div>
                    <span class="block text-gray-500 text-sm" id="assists"></span>
                    <div class="font-bold">Steals</div>
                    <span class="block text-gray-500 text-sm" id="steals"></span>
                    <div class="font-bold">Blocks</div>
                    <span class="block text-gray-500 text-sm" id="blocks"></span>
                </div>
                <div class="bg-secondary-100 text-secondary-200 text-xs uppercase font-bold rounded-full p-2 absolute top-0 ml-3 mt-4 flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span id="playernumber">#25</span>
                </div>
            </div>
            <!-- Content goes here -->
            <div class="card hover:shadow-xl pt-5">
                <div class="m-4">
                    <div class="font-bold mt-10" id="teamname">Games Started</div>
                    <span class="block text-gray-500 text-sm" id="gamesstart"></span>
                    <div class="font-bold">Three Pointers Attempt</div>
                    <span class="block text-gray-500 text-sm" id="threeattempt"></span>
                    <div class="font-bold">Three Pointers Scored</div>
                    <span class="block text-gray-500 text-sm" id="threepts"></span>
                    <div class="font-bold" id="teamname">Turn Overs</div>
                    <span class="block text-gray-500 text-sm" id="turnover"></span>
                    <div class="font-bold">Personal Fouls</div>
                    <span class="block text-gray-500 text-sm" id="foul"></span>
                    <div class="font-bold">Minutes Played</div>
                    <span class="block text-gray-500 text-sm"id="minutes"></span>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        $(document).ready( function () {
            let data = new Object({!! json_encode($players) !!})
            console.log(data)
            $('#table_id thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table_id thead');

            $('#table_id').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function () {
                    var api = this.api();
        
                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function (colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');
        
                            // On every keypress in this input
                            $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('change', function (e) {
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();
        
                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != ''
                                                ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                : '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
                                })
                                .on('keyup', function (e) {
                                    e.stopPropagation();
        
                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
                data: data,
                columns: [
                    { data: 'name' },
                    { data: 'pos' },
                    { data: 'teamname' },
                    {
                        data: 'id',
                        render(id) {
                            return `<button class="view btn border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500" player="${id}" >View</button>`;
                        }
                    }
                ],

            });


            $('#table_id').on('click', 'button',function() {
                let id = $(this).attr('player')
                console.log(name)
                $.ajax({
                    url: `/player/${id}`,
                    success: (data) => {
                        console.log(data)
                        let x = data[0]
                        $('#playername').text(x['playername'])
                        $('#teamname').text(x['name'])
                        $('#team').text(x['code'])
                        $('#pos').text(x['pos'])
                        $('#age').text(x['age'])
                        $('#assists').text(x['assists'])
                        $('#steals').text(x['steals'])
                        $('#playernumber').text(x['number'])
                        $('#blocks').text(x['blocks'])
                        $('#gamesstart').text(x['games_started'])
                        $('#threepts').text(x['3pt'])
                        $('#threeattempt').text(x['3pt_attempted'])
                        $('#turnover').text(x['turnovers'])
                        $('#minutes').text(x['minutes_played'])
                        $('#foul').text(x['personal_fouls'])
                        $('#playerprofile').removeClass('hidden')
                    }
                })
            })

            var playerposition="", playername="", teamname=""
            $("tr input[placeholder='Name']").on('change keydown paste input', function(){
                playername = $(this).val()
            });
            $("tr input[placeholder='Position']").on('change keydown paste input', function(){
                playerposition = $(this).val()
            });
            $("tr input[placeholder='Team']").on('change keydown paste input', function(){
                teamname = $(this).val()
            });

            $('.download').on('click', function() {
                let exportType = $(this).attr('value')
                let player_stats = $('#link-player').is(':checked')
                let team = $('#link-team').is(':checked')
                let rosterView = $('#link-roster').is(':checked')
                if(!player_stats && !team && !rosterView) {
                    alert('Tick at least one of the boxes.')
                } else {
                    window.open(`/export?player_stats=${player_stats}&team=${team}&rosterView=${rosterView}&exportType=${exportType}&position=${playerposition}&player=${playername}&teamname=${teamname}`, '_blank');
                }
            })

        } );
    </script>

    <script>

    </script>
</body>
</html>