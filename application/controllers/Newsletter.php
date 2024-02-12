
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('newsletter_model');
    }
    
    public function subscribe()
    {
        // $data['is_new_subscriber'] = true;
        // if (!$this->newsletter_model->subscriber_exists()) {
        //     $this->newsletter_model->addSubscriber();
        // } else {
        //     $data['is_new_subscriber'] = false;
        // }
        // echo json_encode($data);
        $response = array();

        if (!$this->newsletter_model->subscriber_exists()) {
            if ($this->newsletter_model->addSubscriber()) {
                $response['status'] = 'success';
                $response['message'] = 'Subscriber added successfully.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Failed to add subscriber.';
            }
        } else {
            $response['status'] = 'duplicate';
            $response['message'] = 'Subscriber already exists.';
        }
        echo json_encode($response);
    }
    public function subscribes()
    {
        // Validate and sanitize form input
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            // Form validation failed, handle errors or redirect
            // For example, you can set flash messages and redirect back to the previous page
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // Form validation passed, add subscriber
            $result = $this->newsletter_model->addSubscriber();

            if ($result) {
                // Successful subscription, handle success or redirect
                $this->session->set_flashdata('success', 'You have successfully subscribed to our newsletter.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                // Subscription failed, handle errors or redirect
                $this->session->set_flashdata('error', 'Failed to subscribe. Please try again.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}