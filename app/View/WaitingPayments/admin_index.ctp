<?php 
$this->extend('/Common/blank');
?>

<div class="row">
    <div class="span12">
        <h3 class="page-header"> Payment ALL Management </h3>
    </div>
</div>

<div class='row'>
    <?php
        echo $this->Form->create('WaitingPayment', array(
            'action' => 'index',
            'class' => 'form-horizontal',
            'inputDefaults' => array(
                'label' => array(
                    'class' => 'control-label'
                ),
                'div' => 'control-group',
                'between' => '<div class="controls">',
                'after' => '</div>',
            )
        ));
    ?>
    <div class="span4">
        <?php
        echo $this->Form->input('game_id.', array(
            'type' => 'select',
            'label' => array(
                'class' => 'control-label',
                'text' => 'Game'
            ),
            'multiple',
            'options' => $games,
            'selected' => !empty($this->request->params['named']['game_id']) ? $this->request->params['named']['game_id'] : ''
        ));

        echo $this->Form->input('username', array(
            'type' => 'text',
            'placeholder' => 'id, username or email.',
            'label' => array(
                'class' => 'control-label',
                'text' => 'Username'
            ),
        ));
        ?>
    </div>

    <div class="span8">
        <?php
        echo $this->Form->input('cardnumber', array(
            'type' => 'text',
            'placeholder' => 'Nhập serial',
            'label' => array(
                'class' => 'control-label',
                'text' => 'Serial thẻ'
            ),
        ));

        echo $this->Form->input('cardcode', array(
            'type' => 'text',
            'placeholder' => 'Nhập mã thẻ',
            'label' => array(
                'class' => 'control-label',
                'text' => 'Mã thẻ'
            ),
        ));

        echo $this->Form->input('order_id', array(
            'type' => 'text',
            'placeholder' => 'Order ID.',
            'label' => array(
                'class' => 'control-label',
                'text' => 'OrderID'
            ),
        ));
        ?>
    </div>

    <div class="span12">
        <div class="control-group">
            <label class="control-label" >
                Time
            </label>
            <div class="controls date-range-picker">
                <?php
                echo $this->Form->input('from_time', array(
                    'id' => 'from_time',
                    'value' => isset($this->request->params['named']['from_time']) ? $this->request->params['named']['from_time'] : '',
                    'type' => 'hidden',
                ));
                ?>
                <input class="datepicker" type='text' placeholder="Begin time" data-bind='from_time'>
                <span >&nbsp;To&nbsp;</span>
                <?php
                echo $this->Form->input('to_time', array(
                    'id' => 'to_time',
                    'value' => isset($this->request->params['named']['to_time']) ? $this->request->params['named']['to_time'] : '',
                    'type' => 'hidden',
                ));
                ?>
                <input class="datepicker" type='text' placeholder="End time" data-bind='to_time'>
            </div>
        </div>

        <div class="form-actions">
            <?php
            echo $this->Form->button('Search', array(
                'type' => 'submit',
                'class' => 'btn btn-primary',
                'div' => false
            ));
            echo '  ';
            echo $this->Form->submit('Clear', array(
                'class' => 'btn',
                'name' => 'submit',
                'div' => false
            ));
            ?>
        </div>
    </div>
    <?php  echo $this->Form->end(); ?>
</div>

<br/>
<div class='row'>
<div class='span12'>
    <table class="table table-striped">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo 'Username'; ?></th>
            <th><?php echo 'Game'; ?></th>
            <th><?php echo $this->Paginator->sort('order_id'); ?></th>
            <th><?php echo $this->Paginator->sort('card_code'); ?></th>
            <th><?php echo $this->Paginator->sort('card_serial'); ?></th>
            <th><?php echo $this->Paginator->sort('price'); ?></th>
            <th><?php echo $this->Paginator->sort('time'); ?></th>
            <th><?php echo $this->Paginator->sort('type'); ?></th>
            <th><?php echo $this->Paginator->sort('chanel'); ?></th>
            <th><?php echo $this->Paginator->sort('note'); ?></th>
            <th><?php echo $this->Paginator->sort('status'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
        </tr>

        <?php foreach ($orders as $payment): ?>
            <?php
                $style = "";
                if( !empty($payment['Payment']['test']) ) $style = "color: red;"
            ?>
            <tr style="<?php echo $style; ?>">
                <td><?php echo h($payment['WaitingPayment']['id']); ?>&nbsp;</td>
                <td> <?php echo $this->Html->link($payment['User']['username'], array('controller' => 'users', 'action' => 'view', $payment['User']['id'])); ?> </td>
                <td> <?php echo $payment['Game']['title'] . ' ' . $payment['Game']['os']; ?> </td>
                <td> <?php echo $payment['WaitingPayment']['order_id']; ?> </td>
                <td> <?php echo $payment['WaitingPayment']['card_code']; ?> </td>
                <td> <?php echo $payment['WaitingPayment']['card_serial']; ?> </td>
                <td> <?php if( !empty($payment['Payment']['price']) ) echo $payment['Payment']['price']; ?> </td>
                <td> <?php echo $payment['WaitingPayment']['time']; ?> </td>
                <td> <?php if( !empty($payment['Payment']['type']) ) echo $payment['Payment']['type']; ?> </td>
                <td>
                    <?php
                    $chanel = '';
                    if( !empty($payment['Payment']['chanel']) ) {
                        switch ($payment['Payment']['chanel']) {
                            case Payment::CHANEL_VIPPAY :
                                $chanel = 'Vippay';
                                break;
                        }
                    }
                    echo $chanel;
                    ?>
                </td>
                <td> <?php if( !empty($payment['Payment']['note']) ) echo $payment['Payment']['note']; ?> </td>
                <td> <?php
                    $status = '';
                    if ( isset($payment['WaitingPayment']['status']) ) {
                        switch ($payment['WaitingPayment']['status']){
                            case WaitingPayment::STATUS_WAIT:
                                $status = '<span class="label label-default">Create</span>';
                                break;
                            case WaitingPayment::STATUS_QUEUEING:
                                $status = '<span class="label label-warning">Wait</span>';
                                break;
                            case WaitingPayment::STATUS_COMPLETED:
                                $status = '<span class="label label-success">OK</span>';
                                break;
                            case WaitingPayment::STATUS_ERROR:
                                $status = '<span class="label label-danger">error</span>';
                                break;
                        }

                        echo $status;
                    }
                ?> </td>

                <td> <?php echo $payment['WaitingPayment']['created']; ?> </td>
                <td> <?php echo $payment['WaitingPayment']['modified']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
        ));
        ?>
    </p>
    <div class="paging">
        <?php
        echo $this->element('paging');
        ?>
    </div>
</div>
</div>

<script type="text/javascript" >
    var time_today = <?php echo strtotime('tomorrow midnight'); ?>;

    $(function() {
        $("#WaitingPaymentGameId").chosen();

        $('#quick_datepicker').change(function() {
            if ($(this).val()) {
                var interval = $(this).val() * 24 * 3600;

                if ($('#to_time').val() != time_today) {
                    $('#to_time').val(time_today).trigger('change');
                }

                if ($('#from_time').val() != time_today - interval) {
                    $('#from_time').val(time_today - interval).trigger('change');
                }
            }
        });

        // Set DateAPicker Js defaults
        $('.date-range-picker .datepicker').each(function(i, e) {
            var bindElement = $(e).data('bind');
            var $input = $(e).pickadate({
                onStart: function() {
                    if ($("#" + bindElement).val() != '') {
                        this.set('select', $("#" + bindElement).val() * 1000);
                    }
                },
                onSet: function(thingSet) {
                    if (thingSet.select !== undefined) {
                        $("#" + bindElement).val(thingSet.select / 1000);
                    } else {
                        $("#" + bindElement).val("");
                    }
                }
            });
        });

    });
</script>