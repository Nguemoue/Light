<?php


namespace App\Actions\Admin\DailyBread;


use App\Constants\PathGeneratorConstant;
use App\Events\Admin\Models\DailyBreadCreatedEvent;
use App\Http\Requests\Admin\DailyBread\AdminDailyBreadRequest;
use App\Models\DailyBread;
use Exception;
use Illuminate\Support\Facades\DB;
use PathGenerator;

class AdminDailyBreadStoreAction
{

    /**
     * Stocke un nouvel daily bread en base de donnés et declenche un evenement apres creation
     * @param AdminDailyBreadRequest $request
     * @return DailyBread
     * @throws Exception
     */
    public function handle(AdminDailyBreadRequest $request):DailyBread
    {
        return DB::transaction(function () use ($request){
            $posterUrl = $request->file("image")[0]??null;
            $filePath = $posterUrl?$posterUrl->store(PathGeneratorConstant::DAILY_BREAD):$posterUrl;
            $dailyBread = DailyBread::create([
                'poster_url'=>$filePath,
                "title"=>$request->validated("title"),
                "description"=>$request->validated("description")
            ]);
            if ($dailyBread){
                event(new DailyBreadCreatedEvent($dailyBread));
            }
            return $dailyBread;
        });
    }
}
