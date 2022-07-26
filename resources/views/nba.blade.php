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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  
    @vite('resources/css/app.css')
</head>
<body>

    <table id="table_id" class="display">
        <thead>
            <tr class="text-center">
                <th>Name</th>
                <th>Position</th>
                <th class="">Team</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr> --}}
        </tbody>
    </table>

      <div id="playerprofile" class="">
        <h4 class="font-bold mt-12 pb-2 border-b border-gray-200">Player Name</h4>
        
        <div class="mt-8 grid md:grid-cols-3 gap-10">
            <!-- Content goes here -->
            <div class="card hover:shadow-xl pt-5">
                <div class="m-4">
                    <div class="font-bold mt-10" id="teamname">Team Name</div>
                    <span class="block text-gray-500 text-sm" id="team"></span>
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
                    <span class="block text-gray-500 text-sm" id="blocks" id="minutes"></span>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        $(document).ready( function () {
            let data = new Object({!! json_encode($players) !!})
            console.log(data)
            $('#table_id').DataTable({
                data: data,
                columns: [
                    { data: 'name' },
                    { data: 'pos' },
                    { data: 'team_code' },
                    {
                        data: 'id',
                        render(id) {
                            return `<button class="view btn border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500" player="${id}">View</button>`;
                        }
                    }
                ]
            });
            $('.view').on('click', function() {
                let id = $(this).attr('player')
                $.ajax({
                    url: `/player/${id}`,
                    success: (data) => {
                        console.log(data)
                        $('#playerprofile').removeClass('hidden')
                    }
                })
            })
        } );
    </script>

    <script>

    </script>
</body>
</html>