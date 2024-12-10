<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Models\Session;
use App\Traits\ApiResponses;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ActivityController extends Controller
{
    use ApiResponses;

    public function index() :JsonResponse
    {
        $activity = ActivityResource::collection(Activity::with('sessions')->get());
        return $this->ok('Activity retrieved successfully', $activity);
    }


    public function store(StoreActivityRequest $request)
    {
        // استخراج البيانات المُتحقّقة
        $data = $request->validated();

        // التحقق مما إذا كان هناك صورة مرفقة، وحفظها في مجلد 'activities' في التخزين العام
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        // إنشاء النشاط وحفظه في قاعدة البيانات
        $activity = Activity::create($data);

        // التحقق من إدخال sessionStartTime, sessionEndTime, sessionStatus
        $sessionStartTime = $request->input('sessionStartTime');
        $sessionEndTime = $request->input('sessionEndTime');
        $sessionStatus = $request->input('sessionStatus');

        // إذا كان نوع النشاط هو "course"، قم بإنشاء الجلسات بناءً على التواريخ
        if ($activity->type == "course") {
            $startDate = Carbon::parse($activity->startDate);
            $endDate = Carbon::parse($activity->endDate);
            $targetDays = ['Sunday', 'Tuesday', 'Thursday']; // الأيام المستهدفة

            while ($startDate->lte($endDate)) {
                if (in_array($startDate->format('l'), $targetDays)) {
                    // إنشاء الجلسة المرتبطة بالنشاط
                    Session::create([
                        'activity_id'     => $activity->id,
                        'sessionDate'     => $startDate->toDateString(), // تاريخ الجلسة
                        'sessionStartTime'=> $sessionStartTime, // الوقت المأخوذ من الإدخال
                        'sessionEndTime'  => $sessionEndTime,  // الوقت المأخوذ من الإدخال
                        'status'          => $sessionStatus,   // الحالة المأخوذة من الإدخال
                    ]);
                }
                $startDate->addDay(); // الانتقال إلى اليوم التالي
            }
        }

        // إعادة التوجيه إلى صفحة عرض الأنشطة مع رسالة نجاح
        return redirect()->route('activities.index')->with('success', 'تم إنشاء النشاط والجلسات بنجاح!');
    }



    public function show(Activity $activity)
    {
        $activity->load('sessions');
        return $this->ok('Activity retrieved successfully', new ActivityResource($activity));
    }



    public function update(UpdateActivityRequest $request, Activity $activity): JsonResponse
    {
        $data = $request->validated();
        $activity->update($data);

        return $this->ok('Activity updated successfully', new ActivityResource($activity));
    }


    public function destroy(Activity $activity): JsonResponse
    {
        $activity->delete();

        return $this->ok('Activity deleted successfully');
    }

}
