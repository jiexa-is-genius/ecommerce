<?php namespace App\Http\Controllers\User\Login\Request;


class Api {

    /**
     *  @OA\Post(
     *      path="/user/login",
     *      tags={"Пользователи"},
     *      summary="Авторизация на сайте",
     *      @OA\Response(
     *          response=200,
     *          description="Успешный результат выполнения",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Ошибки заполнения формы"
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          in="query",
     *          required=true,
     *          schema={"type":"email"},
     *          description="E-mail"
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true,
     *          schema={"type":"password"},
     *          description="Пароль"
     *      ),
     *  )
     */
   function login()
    {
        //return new ProfileCollection(Profile::with('user')->paginate());
    }
}
