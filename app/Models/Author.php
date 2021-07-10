<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;

    // // 別名で関連付けることができる。
    // protected $table = 't_author';

    // // 主キーを id でなく author_id にする。
    // protected $primaryKey = 'author_id';

    // // タイムスタンプを記録しない。
    // protected $timestamp = false;

    //
    // Mass assignmentに対する脆弱性対策
    //
    // $fillable と $guarded は排他使用。
    //
    // // 編集可能なカラムを指定する(ホワイトリスト方式)
    // protected $fillable = [
    //     'name',
    //     'kana',
    // ];
    // // 編集を認めないカラムを指定する(ブラックリスト方式)
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];

    use SoftDeletes;
}
