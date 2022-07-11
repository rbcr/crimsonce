<?php

namespace App\Http\Controllers\Api;

/**
 * @OA\Info(title="Crimson Circle Energy Company", version="1.0")
 *
 * @OA\Server(url="http:/crimsonce.site/api/v1")
 */

class Controller
{
    /**
     * @OA\Post(
     *      path="/login",
     *      operationId="login",
     *      tags={"Login"},
     *      description="Login and user token generation",
     *      @OA\Parameter(
     *          name="email",
     *          description="User email",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Successfully login",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMDVkODA2YmFlMGYzYjE5MjdlYTg1OTRkYzgxYWIyM2RmOGZmNzMyYmI5OWIzYTA2ZDc3MTBjODdlZDdjYjk3NjkwMTdjMGI2YWNkM2NjMWUiLCJpYXQiOjE2NTc0ODczMjIsIm5iZiI6MTY1NzQ4NzMyMiwiZXhwIjoxNjg5MDIzMzIyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.TWExT0eRdupuaNOozzDZ2WbVexYrxvBfLk_dLcLf4_H1G9YoxP2n7ovydVx67APVsAR_b4lP5tVKhyGQ-edCYC0e9les9A6CeQHtYpl0oiJ3ExgFdOQj4xPMiT2kSd3GeNHHzBqkgZmPCtIgBKUMyTOO2bU0_3oV2_S5Qmq9bAZ9y_1WJhZ_NF3oSUy9WKwg199jbAtVhLQD0XIXQKVZyZMfFlqucsdyqL9tUQieNBMfQCrPZ3b3DYyEVFVOMBNgKfLwlWEn96zlufEvJty4oIgabcVeIdYbKVHjU4fPPpR020W8M75gLWL_9NvjP7ds8SUTKZW72v-MQwJdd6oLYjOBan82uI2mMChi88IXHvZTvyYw91i9zib--OrWtRZ1OlWzw1oNk0vRAVeDNi209enhtpcAR9plBY8in6kh7KBwF7jfEp_FfK-4_p5vEvuqVSTl-yk49GF96Q47IF_suRXCNQl9VT69L51V_7w0Yojwcig806v_miAEzQKzVn-0fKAHNfcowX4YXm5MankniJidlAbsODgfGI3b2_3HCjc0ElAiG6lwAIn4AkE2iz_HehZHdFquvFYM_OQ-DYgyzryUxIUiVzzu6H6FWP6tAIKvXtXXpZ2rp6Fzru67twIJ0xEXH5yDcrnwA_dQo59pTmjDvYQlCOVwZaHE2angy24",
     *                  description="access_token",
     *                  property="access_token"
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="Bearer",
     *                  description="token_type",
     *                  property="token_type"
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="2023-07-10 23:45:03",
     *                  description="expires_at",
     *                  property="expires_at"
     *              )
     *          )
     *     )
     * )
     */
    public function login(){

    }

    /**
     * @OA\Get(
     *      path="/logout",
     *      operationId="logout",
     *      tags={"Login"},
     *      description="Revoke the user token (logout)",
     *      @OA\Response(
     *          response="200",
     *          description="Successfully logged out",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="boolean",
     *                  default="true",
     *                  description="result",
     *                  property="result"
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="Successfully logged out",
     *                  description="message",
     *                  property="message"
     *              )
     *          )
     *     )
     * )
     */
    public function logout(){

    }

    /**
     * @OA\Post(
     *      path="/add-user",
     *      operationId="addUser",
     *      tags={"Users"},
     *      description="Create professional",
     *      @OA\Parameter(
     *          name="FirstName",
     *          description="User first name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="LastName",
     *          description="User last name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="Email",
     *          description="User email",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="Password",
     *          description="Password",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="CountryCode",
     *          description="User country code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Professional has been successfully created",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="Professional has been successfully created"),
     *              @OA\Property(property="data", type="array", @OA\Items(
     *                  @OA\Property(property="id", type="number", example="1"),
     *              )),
     *          )
     *      )
     *  )
     *)
     */
    public function addUser(){

    }

    /**
     * @OA\Put(
     *      path="/update-user",
     *      operationId="updateUser",
     *      tags={"Users"},
     *      description="Update professional",
     *      @OA\Parameter(
     *          name="FirstName",
     *          description="User first name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="LastName",
     *          description="User last name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="Email",
     *          description="User email",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="Password",
     *          description="Password",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="CountryCode",
     *          description="User country code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Professional has been successfully updated",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="Professional has been successfully updated"),
     *              @OA\Property(property="data", type="array", @OA\Items(
     *                  @OA\Property(property="id", type="number", example="1"),
     *              )),
     *          )
     *      )
     *  )
     *)
     */
    public function updateUser(){

    }

    /**
     * @OA\Delete(
     *      path="/delete-user",
     *      operationId="deleteUser",
     *      tags={"Users"},
     *      description="Delete professionals",
     *      @OA\Parameter(
     *          name="Id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Professional has been successfully deleted",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="Professional has been successfully deleted")
     *          )
     *      )
     *  )
     *)
     */
    public function deleteUser(){

    }

    /**
     * @OA\Post(
     *      path="/import-users",
     *      operationId="importUsers",
     *      tags={"Users"},
     *      description="Import professionals",
     *      @OA\Parameter(
     *          name="number_of_users",
     *          description="Number of users to import",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Information of {quantity} professionals has been imported",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="Information of 100 professionals has been imported")
     *          )
     *      )
     *  )
     *)
     */
    public function importUsers(){

    }

    /**
     * @OA\Get(
     *      path="/get-user",
     *      operationId="getUser",
     *      tags={"Users"},
     *      description="Get current professional",
     *      @OA\Response(
     *          response="200",
     *          description="Professional has been found",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="Professional has been found"),
     *              @OA\Property(property="data", type="array", @OA\Items(
     *                  @OA\Property(property="FirstName", type="string", example="Marilou Schaden"),
     *                  @OA\Property(property="LastName", type="string", example="Quitzon"),
     *                  @OA\Property(property="Email", type="string", example="abernhard@thiel.info"),
     *                  @OA\Property(property="CountryCode", type="string", example="US"),
     *                  @OA\Property(property="CurrentBadge", type="string", example="Bronze"),
     *              ),
     *          )
     *      )
     *  )
     *)
     */
    public function getUser(){

    }

    /**
     * @OA\Post(
     *      path="/network/add",
     *      operationId="addToNetwork",
     *      tags={"Network"},
     *      description="Add professional to network",
     *      @OA\Parameter(
     *          name="email",
     *          description="User email",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="{contact->FirstName} {contact->LastName} has been added to your network",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="Marilou Schaden Quitzon has been added to your network"),
     *              @OA\Property(property="data", type="array", @OA\Items(
     *                  @OA\Property(property="contact_id", type="number", example="1"),
     *              )),
     *          )
     *      )
     *  )
     *)
     */
    public function addToNetwork(){

    }

    /**
     * @OA\Delete(
     *      path="/network/delete",
     *      operationId="deleteToNetwork",
     *      tags={"Network"},
     *      description="Remove professional to network",
     *      @OA\Parameter(
     *          name="email",
     *          description="User email",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="{contact->FirstName} {contact->LastName} has been removed from your network",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="Marilou Schaden Quitzon has been removed from your network")
     *          )
     *      )
     *  )
     *)
     */
    public function deleteFromNetwork(){

    }

    /**
     * @OA\Get(
     *      path="/network/list",
     *      operationId="listNetwork",
     *      tags={"Network"},
     *      description="Get network (direct or indirect) contacts list",
     *      @OA\Parameter(
     *          name="filter",
     *          description="List direct or indirect contacts from professional network",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="sortBy",
     *          description="Order list of contacts by FirstName, LastName or Email",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="number_contacts", type="number", example="1"),
     *              @OA\Property(property="filter", type="string", example="FirstName"),
     *              @OA\Property(property="data", type="array", @OA\Items(
     *                  @OA\Property(property="FirstName", type="string", example="Marilou Schaden"),
     *                  @OA\Property(property="LastName", type="string", example="Quitzon"),
     *                  @OA\Property(property="Email", type="string", example="abernhard@thiel.info"),
     *                  @OA\Property(property="CountryCode", type="string", example="US"),
     *                  @OA\Property(property="CurrentBadge", type="string", example="Bronze"),
     *              ),
     *          )
     *      )
     *  )
     *)
     */
    public function listNetwork(){

    }

    /**
     * @OA\Get(
     *      path="/network/add-random/{quantity}",
     *      operationId="addRandomContacts",
     *      tags={"Network"},
     *      description="Add random number of contacts to network",
     *      @OA\Parameter(
     *          name="quantity",
     *          description="Number of users to add",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="{no_contacts_added} contacts have been added to your network",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="result", type="boolean", example="true"),
     *              @OA\Property(property="message", type="string", example="10 contacts have been added to your network")
     *          )
     *      )
     *  )
     *)
     */
    public function addRandomContacts(){

    }
}
