<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class inone extends Model
{


   public static function getcourses(){
   	$categories= DB::table("categories")->get();
   	$courses=DB::table("courses")->get();
   	return Array(
   "categories"=>$categories,"courses"=>$courses);
   }

   public static function register($array){
   	return DB::table("inhouses")->insert($array);
   }


  public static function getdata(){
   	return DB::select ("select inhouses.id,inhouses.course_id,inhouses.category_id,inhouses.preferred,inhouses.group,inhouses.name,inhouses.email,inhouses.phone,inhouses.designation,inhouses.company,inhouses.country,inhouses.people,inhouses.date,courses.name as course_name from inhouses left join courses on courses.id=inhouses.course_id");

   }


   public static function getCost($array){
      return DB::table("occurrences")->where($array)->get();   
   }

   public static function getPrice($array){
      return DB::table("online_occurrences")->where($array)->get();   
   }


   public static function courseOccurences($array){
   $res= DB::table("online_occurrences")->where($array)->get();   
   $res1= DB::table("occurrences")->where($array)->get();

    return Array("occurrences"=>$res1,"online_occurrences"=>$res);
   }
   
   
    
}
