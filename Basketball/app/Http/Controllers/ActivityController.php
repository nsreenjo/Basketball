<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Coach;
use App\Models\Session;
use App\Models\User;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\optional;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class ActivityController extends Controller
{

        public function index()
        {
            $coaches =Coach::all();

            $activities = Activity::all();
            return view('dashboard.activities.index', compact('activities','coaches'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $coaches = Coach::all();
            return view('activities.create', compact('coaches'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(StoreActivityRequest $request)
        {
            // 1️⃣ **التحقق من البيانات المدخلة**
            $data = $request->validated();

            // 2️⃣ **التحقق من وجود صورة وتحميلها**
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('activities', 'public');
            }

            // 3️⃣ **إنشاء النشاط الجديد**
            $activity = Activity::create($data);

            // 4️⃣ **تحديد الأيام المطلوبة لإنشاء الجلسات**
            $startDate = Carbon::parse($activity->startDate);
            $endDate = Carbon::parse($activity->endDate);
            $targetDays = ['Sunday', 'Tuesday', 'Thursday'];

            if ($activity->type === "course") {
                $sessionNumber = 1; // لترقيم الجلسات
                while ($startDate->lte($endDate)) { // تكرار حتى تاريخ النهاية
                    if (in_array($startDate->format('l'), $targetDays)) { // التحقق من اليوم
                        Session::create([
                            'activity_id'      => $activity->id,
                            'session_number'   => $sessionNumber, // ترقيم الجلسة
                            'sessionDate'      => $startDate->toDateString(), // تنسيق التاريخ (Y-m-d)
                            'sessionStartTime' => '08:00:00', // وقت البدء الافتراضي
                            'sessionEndTime'   => '09:00:00', // وقت الانتهاء الافتراضي
                            'status'           => 'Present', // الحالة الافتراضية
                        ]);
                        $sessionNumber++;
                    }
                    $startDate->addDay(); // الانتقال إلى اليوم التالي
                }
            }

            // 5️⃣ **توجيه المستخدم إلى صفحة عرض الأنشطة مع رسالة نجاح**
            return redirect()->route('activities.index')->with('success', 'تم إنشاء النشاط والجلسات بنجاح!');
        }


    /**
         * Display the specified resource.
         */
        public function show(Activity $activity)
        {
            return view('dashboard.activities.show', compact('activity')); // تحتاج لإنشاء ملف عرض 'activities.show'
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Activity $activity)
        {
            return view('dashboard.activities.edit', compact('activity')); // تحتاج لإنشاء ملف عرض 'activities.edit'
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UpdateActivityRequest $request, Activity $activity)
        {
            $data = $request->validated();

            // إذا كان هناك صورة جديدة مرفوعة
            if ($request->hasFile('image')) {
                // حذف الصورة القديمة إذا كانت موجودة
                if ($activity->image) {
                    \Storage::disk('public')->delete($activity->image);
                }

                $data['image'] = $request->file('image')->store('activities', 'public');
            }

            $activity->update($data);

            return redirect()->route('activities.index')->with('success', 'تم تحديث النشاط بنجاح!');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Activity $activity)
        {
            // حذف الصورة المرتبطة إذا كانت موجودة
            if ($activity->image) {
                \Storage::disk('public')->delete($activity->image);
            }

            $activity->delete();

            return redirect()->route('activities.index');
        }
    }

