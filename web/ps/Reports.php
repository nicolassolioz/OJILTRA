<?php

class Reports
{
    public $apiUrl = 'https://plagiarismsearch.com/api/v3';
    public $apiUser;
    public $apiKey;

    public function __construct($config = array())
    {
        if (!empty($config)) {
            $this->configure($config);
        }
    }

    protected function configure($config = array())
    {
        if (!empty($config)) {
            if (is_array($config)) {
                foreach ($config as $key => $value) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    public function post($url, $post = array(), $files = array())
    {
        $curl = curl_init($url);

        if ($postFields = $this->buildPostFiles($post, $files) or $postFields = $this->buildPostToString($post)) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
        }

        // HTTP basic authentication
        curl_setopt($curl, CURLOPT_USERPWD, $this->apiUser . ':' . $this->apiKey);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);

        $data = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            var_dump($error);
        }

        return $data;
        //return json_decode($data, true);
    }

    private function buildPostToString($post)
    {
        if (!empty($post)) {
            if (is_array($post)) {
                return http_build_query($post, '', '&');
            } else {
                return $post;
            }
        }
        return false;
    }

    private function buildPostFiles($post, $files)
    {
        $result = array();
        if (!empty($post) and is_array($post)) {
            foreach ($post as $key => $value) {
                if (is_array($value)) {
                    $result[$key] = http_build_query($value, '', '&');
                } else {
                    $result[$key] = $value;
                }
            }
        }
        if (!empty($files) and is_array($files)) {
            $result = array_merge($result, $this->buildFiles($files));
        }

        return $result;
    }

    private function buildFiles($files)
    {
        $result = array();
        if (!empty($files)) {
            foreach ($files as $key => $value) {
                if (is_string($value)) {
                    $result[$key] = new CURLFile(realpath($value));
                } elseif (isset($value['tmp_name'])) {
                    $file = $value['tmp_name'];
                    $name = isset($value['name']) ? $value['name'] : null;
                    $type = isset($value['type']) ? $value['type'] : null;

                    $result[$key] = new CURLFile($file, $type, $name);
                }
            }
        }
        return $result;
    }

    public function indexAction($data)
    {
        $url = $this->apiUrl . '/reports';
        return $this->post($url, $data);
    }

    public function createAction($data, $files = array())
    {
        $url = $this->apiUrl . '/reports/create';
        return $this->post($url, $data, $files);
    }

    public function viewAction($id, $data = array())
    {
        $url = $this->apiUrl . '/reports/view/' . $id;
        return $this->post($url, $data);
    }

    public function updateAction($id, $data = array())
    {
        $url = $this->apiUrl . '/reports/update/' . $id;
        return $this->post($url, $data);
    }

    public function deleteAction($id, $data = array())
    {
        $url = $this->apiUrl . '/reports/delete/' . $id;
        return $this->post($url, $data);
    }

    public function statusAction($id, $data = array())
    {
        $url = $this->apiUrl . '/reports/status/' . $id;
        return $this->post($url, $data);
    }

}
