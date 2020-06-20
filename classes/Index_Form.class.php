<?php

/**
 *
 */
class Index_Form {

    /**
     *
     */
    public function __construct() {
        ?><form action="./index.php" method="post">
            <?php
            try {
                $event_list = new Event_List(Event_List::ALL_EVENTS, GUI::FLOAT_LEFT);
                $event_list->show();

                $submit = new Button('View');
                $submit->add_style("margin:2px;");
                $submit->show();
            } catch (AsDbErrorException $e) {
                ?>
                <div class="Error"><?php echo $e->getAsMessage(); ?></div>
                <p><div class="Error">Please try again later.</div></p>
                <?php
            } catch (AsDbException $e) {
                ?>
                <p><div class="Error"><?php echo $e->getAsMessage(); ?></div></p>
                <p><div class="Error">Please try again later.</div></p>
                <?php
        }
        ?>

        <?php
        if (isset($_POST['submitted']) && isset($_POST['event_ID']) && ( $_POST['event_ID'] >= 0 )) {
            try {
                $event = new Event($_POST['event_ID']);
                $competitors = $event->get_competitors();
                $customers = $event->get_customers();
            } catch (AsDbErrorException $e) {
                ?>
                <div class="Error"><?php echo $e->getAsMessage(); ?></div>
                <p><div class="Error">Please try again later.</div></p>
                <?php
            } catch (AsDbException $e) {
                ?>
                <p><div class="Error"><?php echo $e->getAsMessage(); ?></div></p>
                <p><div class="Error">Please try again later.</div></p>
                <?php
            } catch (AsFormValidationException $e) {
                $errors = $e->getAsMessage();
                foreach ($errors as $value) {
                    ?><div class="Error"><?php echo $value ?></div><?php
                }
                unset($value);
                ?><p><div class="Error">Please try again.</div></p><?php
            }
            ?><div id="TicketsSold">Tickets Sold: <?php echo $event->get_tickets_sold(); ?></div>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="3" align="center">Contestants</th>
                        <th colspan="3" align="center">Sold Tickets</th>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Nationality</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Tickets</th>
                    </tr>
                </thead>
                <?php
                if ($competitors || $customers) {
                    ?><tbody>
                        <?php
                        $n = 0;
                        while (( $n < count($competitors) ) || ( $n < count($customers) )) {
                            ?>
                            <tr>
                                <td><?php echo $n < count($competitors) ? $competitors[$n]['firstname'] : ""; ?></td>
                                <td><?php echo $n < count($competitors) ? $competitors[$n]['lastname'] : ""; ?></td>
                                <td><?php echo $n < count($competitors) ? $competitors[$n]['nationality'] : ""; ?></td>
                                <td><?php echo $n < count($customers) ? $customers[$n]['firstname'] : ""; ?></td>
                                <td><?php echo $n < count($customers) ? $customers[$n]['lastname'] : ""; ?></td>
                                <td align="right"><?php echo $n < count($customers) ? $customers[$n]['tickets'] : ""; ?></td>
                            </tr>
                            <?php
                            $n++;
                        }
                        ?></tbody>
                </table>
                <?php
            }
        }
        ?>

        <input type="hidden" name="submitted" value="true" />
        </form>
        <?php
    }

}
