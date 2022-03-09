<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getStudents(){
        $students = DB::select("SELECT * FROM students");
        foreach($students as $student){
            echo $student->name.", ".$student->email.", ".$student->phone."<br>";
        }
    }
    public function getStudent(){
        $students = DB::select("SELECT * FROM students WHERE id = 3");
        foreach($students as $student){
            echo $student->name.", ".$student->email.", ".$student->phone."<br>";
        }
    }
    public function newStudent(){
        $student = DB::insert("INSERT INTO students (name, email, phone) 
                    VALUES (?, ?, ?)", [
                        "Teszt Elek",
                        "elek@valami.hu",
                        "32145678901"
                    ]);
        print($student);
    }
    public function updateStudent(){
        $student = DB::update("UPDATE students SET email = ? WHERE id = 2", ["eszterke@semmi.hu"]);
        print($student);
    }
    public function deleteStudent(){
        $student = DB::delete("DELETE FROM students WHERE name = ?", ["Kathi Béla"]);
        print($student);
    }
    public function listStudent(){
        $students = DB::table("students")
            ->select('name as név', 'email')
            ->first();
        echo "<pre>";
        print_r($students);
    }
    public function listStudent2(){
        $students = DB::table("students")
            ->select('name as név', 'email')
            ->where('name', 'Matteo Wolf')
            ->where('email', 'like', '%example.net')
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function listStudent3(){
        $students = DB::table("students")
            ->select('name as név', 'email')
            ->where('id', 3)
            ->where(function($query){
                $query->where('name', "Edgar D'Amore")
                    ->orWhere('email', "Myrtice Reichel III");
            })
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function listStudent4(){
        $students = DB::table("students")
            ->select('name as név', 'email')
            ->where('id', 3)
            ->orWhere('email', 'iraynor@example.org')
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function listStudent5(){
        $students = DB::table("students")
            ->whereBetween('id', [2,6])
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function listStudent6(){
        $students = DB::table("students")
            ->whereIn('id', [2,6,8])
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function feladat1(){
        $students = DB::table("students")
        ->select('email', 'phone')
        ->get();
    echo "<pre>";
    print_r($students);
    }
    public function feladat2(){
        $students = DB::table("students")
        ->where('email', 'like', '%example.com')
        ->get();
    echo "<pre>";
    print_r($students);
    }
    public function feladat3(){
        $students = DB::table("students")
        ->where('name', 'like', '%pto%')
        ->get();
    echo "<pre>";
    print_r($students);
    }
    public function joinStudent1(){
        $students = DB::table('students')
            ->join('courses', 'students.id', '=', 'courses.student_id')
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function joinStudent2(){
        $students = DB::table('students')
            ->select('students.name as Név', 'students.email as Email', 'courses.course as Tanfolyam', 'courses.price as Ár')
            ->leftjoin('courses', 'students.id', '=', 'courses.student_id')
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function joinStudent3(){
        $students = DB::table('students')
            ->select('students.name as Név', 'students.email as Email', 'courses.course as Tanfolyam', 'courses.price as Ár')
            ->rightjoin('courses', 'students.id', '=', 'courses.student_id')
            ->get();
        echo "<pre>";
        print_r($students);
    }
    public function insertStudent() {

        DB::table( "courses" )->insert(
            [
                [ "course" => "Django", "price" => 220000, "student_id" => 14 ],
                [ "course" => "C++", "price" => 180000, "student_id" => 23 ]
            ]
            );
        echo "Adtatok elmentve";
    }

    public function updateCourse() {

        DB::table( "courses" )->where( "id", 6 )->update([
            "course" => "Angular",
            "price" => 170000,
            "student_id" => 38 
        ]);

        echo "Módosítás sikeres";
    }

    public function updateOrCourse() {

        DB::table( "courses" )->updateOrInsert(
            
            [ "course" => "C" ],
            [ "course" => "C", "price" => 100000, "student_id" => 4 ]
        );

        echo "Adatok frissítve";
    }

    public function deleteCourse() {

        DB::table( "courses" )->where( "id", 6 )->delete();
    }

}
