<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text left">
						Sales Prediction
					</h5>
					<?php
						/*echo $this->Html->link('<i class="material-icons">add</i>',
							array(
								'action' => 'add',
							),
							array(
								'escape' => false,
								'class' => 'btn-floating btn-small waves-effect waves-light blue-grey darken-2 right tooltipped',
								'data-position' => 'bottom',
								'data-delay' => 25,
								'data-tooltip' => 'Add record'
							)
						);
						echo $this->Html->link('<i class="material-icons">play_for_work</i>',
							array(
								'#'
							),
							array(
								'id' => 'download-report-toggle',
								'escape' => false,
								'class' => 'btn-floating btn-small waves-effect waves-light blue-grey darken-2 right tooltipped',
								'data-position' => 'bottom',
								'data-delay' => 25,
								'data-tooltip' => 'Download report'
							)
						);*/
					?>
				</div>
			</div>

			<div class="row no-margin">
				<div class="content-sub-header teal lighten-5" id="download-csv-area">
					<?php
						echo $this->Form->create('PurchaseOrder', array('class' => 'col s12'));
					?>
						<div class="row">
							<div class="col s4">
							<?php
								echo $this->Form->year('PurchaseOrder.start_year', 2015, date('Y'), array(
									'empty' => 'Start Year',
									'class' => 'browser-default',
								));
							?>
							</div>
							<div class="col s4">
							<?php
								echo $this->Form->year('PurchaseOrder.end_year', 2015, date('Y'), array(
									'empty' => 'End Year',
									'class' => 'browser-default',
								));
							?>
							</div>
							<div class="col s4">
							<?php
								echo $this->Form->month('PurchaseOrder.month', array(
									'empty' => 'Month',
									'div' => 'col s4',
									'class' => 'browser-default'
								));
							?>
							</div>
						</div>
						<div class="row">
						<?php
							echo $this->Form->submit('Calculate', array(
								'div' => 'input-field col s12',
								'class' => 'btn'
							));
						?>
						</div>
					<?php
						echo $this->Form->end();
					?>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="data-table">
						<?php if (isset($years) and sizeof($years) > 0): ?>
						<div class="row">
							<div class="col s6">
								<?php
									$total_products = array();
									if (isset($years)):
										foreach ($years as $year => $products):
											echo '<h5>' . $year . '</h5>';
											foreach ($products as $product):
												$total_products[$product['Product']['id']] = array(
													'name' => $product['Product']['name'],
													'qty' => $product['qty']
												);
												echo '<p><strong>' . $product['Product']['name'] . ':</strong> ' . $product['qty'] . '</p>';
											endforeach;
										endforeach;
									endif;
								?>
							</div>
							<div class="col s6">
								<h5>Averages</h5>
								<?php
									if (isset($years)):
										foreach ($total_products as $product):
											echo '<p><strong>' . $product['name'] . ':</strong> ' . ceil($product['qty'] / sizeof($years)) . '</p>';
										endforeach;
									endif;
								?>
							</div>
						</div>
						<?php else: ?>
						No data available.
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>