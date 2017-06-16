<?php

namespace DependenCI\GLWebhooks;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GLWebhooks
{
    /**
     * Handle a webhook coming from GitLab.
     *
     * @return Response
     */
     public function handle()
     {
         if (config('glwebhook.secret'))
         {
           abort_unless($this->gitlabSignatureIsValid(), 301, config('glwebhooks.secreterror', "This action didn't come from GitLab or webhooks aren't properly configured.")); // TODO: Use throw_unless BadRequestHttpException in Laravel 5.5
         }

         $data = request()->input();

         $class = sprintf(config('glwebhooks.eventclass'), ucfirst(camel_case($data['object_kind'])));

         if (! class_exists($class)) { // TODO: Use throw_unless BadRequestHttpException in Laravel 5.5
             throw new BadRequestHttpException(config('glwebhooks.eventerror', 'Event not supported.'));
         }

         if (class_exists(config('glwebhooks.model')))
         {
           $model = config('glwebhooks.model')::find($data['project_id']);

           if (! $model) { // TODO: Use throw_unless BadRequestHttpException in Laravel 5.5
               throw new BadRequestHttpException(config('glwebhooks.modelerror', "This repository doesn't exist in this application."));
           }
           event(new $class($model, $data));
           return response()->json(config('glwebhooks.response', ['message' => 'Event successfully received.']));
         }

         event(new $class($data));
         return response()->json(config('glwebhooks.response', ['message' => 'Event successfully received.']));
     }

    /**
     * Check if a webhook request came from GitLab.
     *
     * @return boolean
     */
     protected function gitlabSignatureIsValid() : bool
     {
         $gitLabSecret = request()->header('X-Gitlab-Token', 'example');

         return $gitLabSecret === $this->getSecret();
     }
}
